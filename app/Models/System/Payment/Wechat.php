<?php

namespace App\Models\System\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Wechat.
 *
 * @package namespace App\Models\System\Payment;
 */
class Wechat extends Model
{
    use SoftDeletes;

    protected $table = 'system_payment_wechat';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'mch_id', 'mch_public_cert_path', 'mch_secret_cert', 'mch_secret_cert_file', 'mch_secret_key', 'mode', 'mode_type', 'name', 'scene', 'status', 'sub_app_id', 'sub_mch_id', 'sub_mini_app_id', 'sub_mp_app_id'
    ];
    // MODE_NORMAL =>0, MODE_SANDBOX=>1, MODE_SERVICE=>2 关于服务模式
    // scene 使用场景
    protected $attributes = [
        'status' => 'on'
    ];
    protected $casts = [
        'scene' => 'array'
    ];


//
}
