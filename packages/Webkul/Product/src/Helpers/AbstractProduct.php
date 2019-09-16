<?php

namespace Webkul\Product\Helpers;

use Webkul\Product\Models\ProductAttributeValue;

abstract class AbstractProduct
{
    /**
     * Add Channle and Locale filter
     *
     * @param Attribute $attribute
     * @param QB $qb
     * @param sting $alias
     * @return QB
     */
    public function applyChannelFilter($attribute, $qb, $alias = 'product_attribute_values')
    {
        $channel = request()->get('channel') ?: (core()->getCurrentChannelCode() ?: core()->getDefaultChannelCode());

        $qb->where($alias . '.channel', $channel);

        return $qb;
    }
}
