<?php

namespace Modules\Mall\Entities\System;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notice extends Model
{
    use SoftDeletes;

    protected $table = 'mall_system_notice';
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'link', 'link_type', 'link_id', 'status', 'sort'
    ];
    protected $attributes = [
        'status' => 'on',
        'sort' => 0
    ];
}
