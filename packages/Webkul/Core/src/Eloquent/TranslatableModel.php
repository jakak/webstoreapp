<?php

namespace Webkul\Core\Eloquent;

use Illuminate\Database\Eloquent\Model;
use Dimsav\Translatable\Translatable;

class TranslatableModel extends Model
{
    use Translatable;

    /**
     * @param string $key
     *
     * @return bool
     */
    protected function isKeyALocale($key)
    {
        return false;
    }

    /**
     * @return string
     */
    protected function locale()
    {
        return  'en';
    }

    /**
     * @return boolean
     */
    protected function isChannelBased()
    {
        return false;
    }
}
