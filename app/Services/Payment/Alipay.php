<?php
/**
 * @Note
 * @author Je t'aime
 * @Version
 * @Time 2021/8/14 15:59
 */

namespace App\Services\Payment;

use App\Exceptions\Exception\ErrorException;
use App\Models\System\Payment\Log;
use App\Repositories\Interfaces\System\Payment\AlipayRepository;
use App\Repositories\Interfaces\System\Payment\LogRepository;
use Illuminate\Support\Str;
use Yansongda\Pay\Pay;

class Alipay
{
    public function config($id)
    {
        $alipayInfo = app(AlipayRepository::class)->find($id)['data'];
        return [
            'alipay' => [
                'default' => [
                    'app_id' => $alipayInfo['app_id'],
                    // 应用私钥
                    'app_secret_cert' => $alipayInfo['app_secret_cert'],
                    // 应用公钥证书路径
                    'app_public_cert_path' => $alipayInfo['app_public_cert_path'],
                    // 支付宝公钥证书路径
                    'alipay_public_cert_path' => $alipayInfo['alipay_public_cert_path'],
                    // 支付宝根证书路径
                    'alipay_root_cert_path' => $alipayInfo['alipay_root_cert_path'],
                    'service_provider_id' => $alipayInfo['service_provider_id'],
                    'notify_url' => '',
                    'return_url' => '',
                    // 选填-默认为正常模式。可选为： MODE_NORMAL->0, MODE_SANDBOX->1, MODE_SERVICE->2
                    'mode' =>$alipayInfo['mode'] ,  // optional,设置此参数，将进入沙箱模式
                ],
            ],
            'logger' => [ // optional
                'enable' => false,
                'file' => './logs/alipay.log',
                'level' => 'debug', // 建议生产环境等级调整为 info，开发环境为 debug
                'type' => 'daily', // optional, 可选 daily.
                'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
            ],
            'http' => [ // optional
                'timeout' => 5.0,
                'connect_timeout' => 5.0,
            ],
        ];
    }

    public function handleData($resultInfo)
    {
        $pay['total_amount'] = $resultInfo['money'];
        $pay['subject'] = $resultInfo['subject'];
        $pay['out_trade_no'] = $resultInfo['out_trade_no'];
        $pay['notify_url'] = config('mall.notify_alipay') . $resultInfo['token'];
        return $pay;
    }

    public function sendPay($id)
    {
        $resultInfo = app(LogRepository::class)->find($id)['data'];
        return Pay::alipay($this->config($resultInfo['account_id']))->app($this->handleData($resultInfo));
    }

}
