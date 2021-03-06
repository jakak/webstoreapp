<?php

namespace Webkul\Product\Repositories;

use Illuminate\Container\Container as App;
use DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Event;
use Webkul\Attribute\Models\AttributeOption;
use Webkul\Core\Eloquent\Repository;
use Webkul\Attribute\Repositories\AttributeRepository;
use Webkul\Attribute\Repositories\AttributeOptionRepository;
use Webkul\Core\Models\Channel;
use Webkul\Product\Models\Product;
use Webkul\Product\Models\ProductAttributeValue;
use Webkul\Product\Contracts\Criteria\ActiveProductCriteria;
use Webkul\Product\Contracts\Criteria\AttributeToSelectCriteria;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Webkul\Product\Models\ProductFlat;

/**
 * Product Repository
 *
 * @author    Jitendra Singh <jitendra@webkul.com>
 * @copyright 2018 Webkul Software Pvt Ltd (http://www.webkul.com)
 */
class ProductRepository extends Repository
{
    /**
     * AttributeRepository object
     *
     * @var array
     */
    protected $attribute;

    /**
     * AttributeOptionRepository object
     *
     * @var array
     */
    protected $attributeOption;

    /**
     * ProductAttributeValueRepository object
     *
     * @var array
     */
    protected $attributeValue;

    /**
     * ProductFlatRepository object
     *
     * @var array
     */
    protected $productInventory;

    /**
     * ProductImageRepository object
     *
     * @var array
     */
    protected $productImage;

    protected $defaultChannel;

    /**
     * Create a new controller instance.
     *
     * @param  Webkul\Attribute\Repositories\AttributeRepository           $attribute
     * @param  Webkul\Attribute\Repositories\AttributeOptionRepository     $attributeOption
     * @param  Webkul\Attribute\Repositories\AttributeOptionRepository     $attributeOption
     * @param  Webkul\Product\Repositories\ProductAttributeValueRepository $attributeValue
     * @param  Webkul\Product\Repositories\ProductImageRepository          $productImage
     * @return void
     */
    public function __construct(
        AttributeRepository $attribute,
        AttributeOptionRepository $attributeOption,
        ProductAttributeValueRepository $attributeValue,
        ProductInventoryRepository $productInventory,
        ProductImageRepository $productImage,
        App $app)
    {
        $this->attribute = $attribute;

        $this->attributeOption = $attributeOption;

        $this->attributeValue = $attributeValue;

        $this->productInventory = $productInventory;

        $this->productImage = $productImage;

        $this->defaultChannel = Channel::first();
        parent::__construct($app);
    }

    /**
     * Specify Model class name
     *
     * @return mixed
     */
    function model()
    {
        return 'Webkul\Product\Models\Product';
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        //before store of the product
        Event::fire('catalog.product.create.before');

        $product = $this->model->create($data);

        $nameAttribute = $this->attribute->findOneByField('code', 'status');
        $this->attributeValue->create([
                'product_id' => $product->id,
                'attribute_id' => $nameAttribute->id,
                'value' => 1
            ]);

        if (isset($data['super_attributes'])) {

            $super_attributes = [];

            foreach ($data['super_attributes'] as $attributeCode => $attributeOptions) {
                $attribute = $this->attribute->findOneByField('code', $attributeCode);

                $super_attributes[$attribute->id] = $attributeOptions;

                $product->super_attributes()->attach($attribute->id);
            }

            foreach (array_permutation($super_attributes) as $permutation) {
                $this->createVariant($product, $permutation);
            }
        }

        //after store of the product
        Event::fire('catalog.product.create.after', $product);

        return $product;
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function update(array $data, $id, $attribute = "id")
    {
        Event::fire('catalog.product.update.before', $id);

        $product = $this->find($id);

        if ($product->parent_id && $this->checkVariantOptionAvailabiliy($data, $product)) {
            $data['parent_id'] = NULL;
        }

        $product->update($data);

        $attributes = $product->attribute_family->custom_attributes;

        foreach ($attributes as $attribute) {
            if (! isset($data[$attribute->code]) || (in_array($attribute->type, ['date', 'datetime']) && ! $data[$attribute->code]))
                continue;

            $attributeValue = $this->attributeValue->findOneWhere([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
                ]);

            if (! $attributeValue) {
                $this->attributeValue->create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => $data[$attribute->code],
                    'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
                ]);
            } else {
                $this->attributeValue->update([
                    ProductAttributeValue::$attributeTypeFields[$attribute->type] => $data[$attribute->code]
                    ], $attributeValue->id
                );
            }
        }

        $this->updateFixedAttributes($product, $data);

        if (request()->route()->getName() != 'admin.catalog.products.massupdate') {
            if  (isset($data['categories'])) {
                $product->categories()->sync($data['categories']);
            }

            $previousVariantIds = $product->variants->pluck('id');

            if (isset($data['variants'])) {
                foreach ($data['variants'] as $variantId => $variantData) {
                    if (str_contains($variantId, 'variant_')) {
                        $permutation = [];
                        foreach ($product->super_attributes as $superAttribute) {
                            $permutation[$superAttribute->id] = $variantData[$superAttribute->code];
                        }

                        $this->createVariant($product, $permutation, $variantData);
                    } else {
                        if (is_numeric($index = $previousVariantIds->search($variantId))) {
                            $previousVariantIds->forget($index);
                        }

                        $variantData['channel'] = $this->defaultChannel->id;

                        $this->updateVariant($variantData, $variantId);
                    }
                }
            }

            foreach ($previousVariantIds as $variantId) {
                $this->delete($variantId);
            }

            $this->productInventory->saveInventories($data, $product);

            $this->productImage->uploadImages($data, $product);
        }

        Event::fire('catalog.product.update.after', $product);

        return $product;
    }

    public function updateFixedAttributes($product, $data)
    {
        foreach ((new Product())->fixedAttributeAndValues() as $key => $value)
        {
            $attribute = $this->attribute->findOneWhere(['code' => $key]);

            $attributeValue = $this->attributeValue->findOneWhere([
                'product_id' => $product->id,
                'attribute_id' => $attribute->id,
                'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
            ]);
            if ($attributeValue) {
                $this->attributeValue->update([
                    ProductAttributeValue::$attributeTypeFields[$attribute->type] => $value
                ], $attributeValue->id
                );
            } else {
                $this->attributeValue->create([
                    'product_id' => $product->id,
                    'attribute_id' => $attribute->id,
                    'value' => $value,
                    'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
                ]);
            }

        }

        $prod_flat = ProductFlat::where('product_id', $product->id)->first();
        $attributeOption = AttributeOption::find($data['product_spotlight']);
        if ($attributeOption->admin_name === 'New')
        {
            $prod_flat->featured = false;
            $prod_flat->new = true;
        } elseif ($attributeOption->admin_name === 'Featured')
        {
            $prod_flat->featured = true;
            $prod_flat->new = false;
        } else
        {
            $prod_flat->featured = false;
            $prod_flat->new = false;
        }
        $prod_flat->save();

    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {
        Event::fire('catalog.product.delete.before', $id);

        parent::delete($id);

        Event::fire('catalog.product.delete.after', $id);
    }

    /**
     * @param mixed $product
     * @param array $permutation
     * @param array $data
     * @return mixed
     */
    public function createVariant($product, $permutation, $data = [])
    {
        if (! count($data)) {
            $data = [
                    "sku" => $product->sku . '-variant-' . implode('-', $permutation),
                    "name" => "",
                    "inventories" => [],
                    "price" => 0,
                    "weight" => 0,
                    "status" => 1
                ];
        }

        $variant = $this->model->create([
                'parent_id' => $product->id,
                'type' => 'simple',
                'attribute_family_id' => $product->attribute_family_id,
                'sku' => $data['sku'],
            ]);

        foreach (['sku', 'name', 'price', 'weight', 'status'] as $attributeCode) {
            $attribute = $this->attribute->findOneByField('code', $attributeCode);
            foreach (core()->getAllChannels() as $channel) {
                $this->attributeValue->create([
                        'product_id' => $variant->id,
                        'attribute_id' => $attribute->id,
                        'channel' => $channel->code,
                        'value' => $data[$attributeCode]
                    ]);
            }
        }

        foreach ($permutation as $attributeId => $optionId) {
            $this->attributeValue->create([
                    'product_id' => $variant->id,
                    'attribute_id' => $attributeId,
                    'value' => $optionId
                ]);
        }

        $this->productInventory->saveInventories($data, $variant);

        return $variant;
    }

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function updateVariant(array $data, $id)
    {
        $variant = $this->find($id);

        $variant->update(['sku' => $data['sku']]);

        foreach (['sku', 'name', 'price', 'weight', 'status'] as $attributeCode) {
            $attribute = $this->attribute->findOneByField('code', $attributeCode);

            $attributeValue = $this->attributeValue->findOneWhere([
                    'product_id' => $id,
                    'attribute_id' => $attribute->id,
                    'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
                ]);

            if (! $attributeValue) {
                $this->attributeValue->create([
                        'product_id' => $id,
                        'attribute_id' => $attribute->id,
                        'value' => $data[$attribute->code],
                        'channel' => $attribute->value_per_channel ? $this->defaultChannel->id : null,
                    ]);
            } else {
                $this->attributeValue->update([
                    ProductAttributeValue::$attributeTypeFields[$attribute->type] => $data[$attribute->code]
                ], $attributeValue->id);
            }
        }

        $this->productInventory->saveInventories($data, $variant);

        return $variant;
    }

    /**
     * @param array $data
     * @param mixed $product
     * @return mixed
     */
    public function checkVariantOptionAvailabiliy($data, $product)
    {
        $parent = $product->parent;

        $superAttributeCodes = $parent->super_attributes->pluck('code');

        $isAlreadyExist = false;

        foreach ($parent->variants as $variant) {
            if ($variant->id == $product->id)
                continue;

            $matchCount = 0;

            foreach ($superAttributeCodes as $attributeCode) {
                if (! isset($data[$attributeCode]))
                    return false;

                if ($data[$attributeCode] == $variant->{$attributeCode})
                    $matchCount++;
            }

            if ($matchCount == $superAttributeCodes->count()) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param integer $categoryId
     * @return Collection
     */
    public function findAllByCategory($categoryId = null)
    {
        $params = request()->input();

        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use($params, $categoryId) {
                $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

                $locale = request()->get('locale') ?: app()->getLocale();

                $qb = $query->distinct()
                        ->addSelect('product_flat.*')
                        ->addSelect(DB::raw('IF( product_flat.special_price_from IS NOT NULL 
                            AND product_flat.special_price_to IS NOT NULL , IF( NOW( ) >= product_flat.special_price_from
                            AND NOW( ) <= product_flat.special_price_to, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) , IF( product_flat.special_price_from IS NULL , IF( product_flat.special_price_to IS NULL , IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , IF( NOW( ) <= product_flat.special_price_to, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) ) , IF( product_flat.special_price_to IS NULL , IF( NOW( ) >= product_flat.special_price_from, IF( product_flat.special_price IS NULL OR product_flat.special_price = 0 , product_flat.price, LEAST( product_flat.special_price, product_flat.price ) ) , product_flat.price ) , product_flat.price ) ) ) AS price'))

                        ->leftJoin('products', 'product_flat.product_id', '=', 'products.id')
                        ->leftJoin('product_categories', 'products.id', '=', 'product_categories.product_id')
                        ->where('product_flat.visible_individually', 1)
                        ->where('product_flat.status', 1)
                        ->where('product_flat.channel', $channel)
                        ->whereNotNull('product_flat.url_key')
                        ->where('product_categories.category_id', $categoryId);

                $queryBuilder = $qb->leftJoin('product_flat as flat_variants', function($qb) use($channel, $locale) {
                    $qb->on('product_flat.id', '=', 'flat_variants.parent_id')
                        ->where('flat_variants.channel', $channel)
                        ->where('flat_variants.locale', $locale);
                });

                if (isset($params['sort'])) {
                    $attribute = $this->attribute->findOneByField('code', $params['sort']);

                    if ($params['sort'] == 'price') {
                        $qb->orderBy($attribute->code, $params['order']);
                    } else {
                        $qb->orderBy($params['sort'] == 'created_at' ? 'product_flat.created_at' : $attribute->code, $params['order']);
                    }
                }

                $qb = $qb->where(function($query1) {
                    foreach (['product_flat', 'flat_variants'] as $alias) {
                        $query1 = $query1->orWhere(function($query2) use($alias) {
                            $attributes = $this->attribute->getProductDefaultAttributes(array_keys(request()->input()));

                            foreach ($attributes as $attribute) {
                                $column = $alias . '.' . $attribute->code;

                                $queryParams = explode(',', request()->get($attribute->code));

                                if ($attribute->type != 'price') {
                                    $query2 = $query2->where(function($query3) use($column, $queryParams) {
                                        foreach ($queryParams as $filterValue) {
                                            $query3 = $query3->orWhere($column, $filterValue);
                                        }
                                    });
                                } else {
                                    $query2 = $query2->where($column, '>=', current($queryParams))->where($column, '<=', end($queryParams));
                                }
                            }
                        });
                    }
                });

                return $qb;
            })->paginate(isset($params['limit']) ? $params['limit'] : 9);

        return $results;
    }

    /**
     * Retrive product from slug
     *
     * @param string $slug
     * @return mixed
     * @throws \Prettus\Repository\Exceptions\RepositoryException
     */
    public function findBySlugOrFail($slug, $columns = null)
    {
        $attribute = $this->attribute->findOneByField('code', 'url_key');

        $attributeValue = $this->attributeValue->findOneWhere([
            'attribute_id' => $attribute->id,
            ProductAttributeValue::$attributeTypeFields[$attribute->type] => $slug
        ], ['product_id']);

        if ($attributeValue && $attributeValue->product_id) {
            $this->pushCriteria(app(ActiveProductCriteria::class));
            $this->pushCriteria(app(AttributeToSelectCriteria::class)->addAttribueToSelect($columns));

            $product = $this->findOrFail($attributeValue->product_id);

            return $product;
        }

        throw (new ModelNotFoundException)->setModel(
            get_class($this->model), $slug
        );
    }

    /**
     * Returns newly added product
     *
     * @return Collection
     */
    public function getNewProducts()
    {
        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());
        $channelProperty = Channel::first();
        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use ($channel, $channelProperty) {

            $locale = request()->get('locale') ?: app()->getLocale();

            return $query->distinct()
                ->addSelect('product_flat.*')
                ->where('product_flat.status', 1)
                ->where('product_flat.new', 1)
                ->where('product_flat.channel', $channel)
                ->orderBy('product_id', 'desc');
        })->paginate($this->productsToPaginate($channelProperty->new_product_row));

        return $results;
    }

    public function productsToPaginate($select)
    {
        if (is_null($select)) {
            $select = 1;
        }
        return $select * 4;
    }
    /**
     * Returns featured product
     *
     * @return Collection
     */
    public function getFeaturedProducts()
    {
        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());
        $channelProperty = Channel::first();
        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use ($channel, $channelProperty) {

            return $query->distinct()
                ->addSelect('product_flat.*')
                ->where('product_flat.status', 1)
                ->where('product_flat.featured', 1)
                ->where('product_flat.channel', $channel)
                ->orderBy('product_id', 'desc');
        })->paginate($this->productsToPaginate($channelProperty->new_featured_row));

        return $results;
    }

    /**
     * Search Product by Attribute
     *
     * @param $term
     * @return Collection
     */
    public function searchProductByAttribute($term) {
        $results = app('Webkul\Product\Repositories\ProductFlatRepository')->scopeQuery(function($query) use($term) {
                $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

                $locale = request()->get('locale') ?: app()->getLocale();

                return $query->distinct()
                        ->addSelect('product_flat.*')
                        ->where('product_flat.status', 1)
                        ->where('product_flat.channel', $channel)
                        ->whereNotNull('product_flat.url_key')
                        ->where('product_flat.name', 'like', '%' . $term . '%')
                        ->orderBy('product_id', 'desc');
            })->paginate(16);

        return $results;
    }
}
