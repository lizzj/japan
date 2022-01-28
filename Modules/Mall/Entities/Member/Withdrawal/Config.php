<?php

namespace Modules\Mall\Entities\Member\Withdrawal;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Config extends Model
{
    protected $table = 'mall_member_withdrawal_config';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'min_num', 'base_num', 'poundage', 'description'
    ];
}
