<?php

namespace App\Models\System\Payment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Alipay extends Model
{
    use SoftDeletes;

    protected $table = 'system_payment_alipay';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'name', 'app_id', 'app_secret_cert', 'app_secret_cert_file', 'app_public_cert_path', 'alipay_public_cert_path', 'alipay_root_cert_path', 'status', 'mode', 'service_provider_id', 'mode_type', 'scene'
    ];
    // MODE_NORMAL =>0, MODE_SANDBOX=>1, MODE_SERVICE=>2 关于服务模式
    // scene 使用场景
    protected $attributes = [
        'status' => 'on'
    ];
    protected $casts = [
        'scene' => 'array'
    ];

}
