<?php

namespace Modules\Mall\Entities\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @note: 轮播管理
 * @author: Je t'aime
 * @time: 2021/12/6 19:14
 */
class Swipe extends Model
{
    use SoftDeletes;

    protected $table = 'mall_system_swipe';
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'location', 'link', 'link_type', 'link_id', 'sort', 'status', 'image'
    ];
    protected $attributes = [
        'status' => 'on',
        'sort' => 0
    ];

}
