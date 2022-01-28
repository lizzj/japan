<?php

namespace Modules\Mall\Entities\Member\Withdrawal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Model
{
    use SoftDeletes;

    protected $table = 'mall_member_withdrawal_type';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'icon', 'code','verify','sort','status','default'
    ];
    protected $attributes = [
        'status' => 'on',
        'sort' => 0,
        'verify'=>'no',
        'default'=>'no'
    ];
}
