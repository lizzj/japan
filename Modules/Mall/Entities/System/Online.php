<?php

namespace Modules\Mall\Entities\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * 在线充值
 */
class Online extends Model
{
    use SoftDeletes;

    protected $table = 'mall_system_online';
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'price', 'actual', 'sort', 'tip', 'status'
    ];
    protected $attributes = [
        'status' => 'on',
    ];
}
