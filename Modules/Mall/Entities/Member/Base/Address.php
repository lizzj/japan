<?php

namespace Modules\Mall\Entities\Member\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use  SoftDeletes;

    protected $table = 'mall_member_base_address';
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'user_id', 'name', 'phone', 'province', 'city', 'area', 'address', 'default'
    ];
    protected $attributes = [
        'default' => 'no'
    ];
}
