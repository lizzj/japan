<?php

namespace Modules\Mall\Entities\Member\Withdrawal;

use App\Models\Auth\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use SoftDeletes;

    protected $table = 'mall_member_withdrawal_log';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'user_id', 'type_id', 'withdrawal_num', 'withdrawal_poundage', 'real_pay', 'audit', 'audit_at', 'audit_result', 'name', 'account','remark'
    ];
    protected $attributes = [
        'audit' => 'no'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class)->withTrashed();
    }
}
