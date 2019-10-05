<?php

namespace Webkul\Attribute\Models;

use Webkul\Core\Eloquent\TranslatableModel;

class AttributeOption extends TranslatableModel
{
    public $timestamps = false;

    public $translatedAttributes = ['label'];

    protected $fillable = ['admin_name', 'sort_order'];

    /**
     * Get the attribute that owns the attribute option.
     */
    public function attribute()
    {
        return $this->model()->getCustomAttributesAttribute();
    }
}
