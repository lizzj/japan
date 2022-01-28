<?php

namespace App\Models\System\Payment;

use App\Models\Auth\User\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

/**
 * Class Log.
 *
 * @package namespace App\Models\System\Payment;
 */
class Log extends Model
{
    use SoftDeletes;

    protected $table = 'system_payment_log';
    public $timestamps = true;
    public const UPDATED_AT = null;
    protected $dateFormat = 'U';
    protected $fillable = [
        'account_id', 'money', 'notify_at', 'account_type', 'out_trade_no', 'relate_id', 'relate_type', 'result', 'status', 'subject', 'token', 'user_id'
    ];
    protected $attributes = [
        'status' => 'fail'
    ];
    protected $casts=[
        'result'=>'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
