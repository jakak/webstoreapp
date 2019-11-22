<?php

namespace Webkul\Attribute\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;
use Webkul\Attribute\Models\Attribute;

class AttributeGroup extends Model
{
    use Rememberable;

    public $timestamps = false;

    protected $fillable = ['name', 'position', 'is_user_defined'];

    /**
     * Get the attributes that owns the attribute group.
     */
    public function custom_attributes()
    {
        return $this->belongsToMany(Attribute::class, 'attribute_group_mappings')
            ->withPivot('position')
            ->orderBy('pivot_position', 'asc');
    }
}
