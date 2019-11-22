<?php

namespace Webkul\Core\Models;

use Illuminate\Database\Eloquent\Model;
use Watson\Rememberable\Rememberable;

class SubscribersList extends Model
{
    use Rememberable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'subscribers_list';

    protected $fillable = [
        'email', 'is_subscribed', 'token', 'channel_id'
    ];

    protected $hidden = ['token'];
}
