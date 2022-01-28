<?php
/**
 * @Note
 * @author Je t'aime
 * @Version
 * @Time 2021/8/14 15:59
 */

namespace App\Services\Payment;

use App\Repositories\Interfaces\System\Payment\LogRepository;
use App\Repositories\Interfaces\System\Payment\WechatRepository;
use Yansongda\Pay\Pay;

class Wechat
{
    protected function config($id)
    {
        $wechatInfo = app(WechatRepository::class)->find($id)['data'];
        return [
            'wechat' => [
                'default' => [
                    // 公众号 的 app_id
                    'mp_app_id' => '',
                    // 小程序 的 app_id
                    'mini_app_id' => '',
                    // app 的 app_id
                    'app_id' => $wechatInfo['app_id'],
                    // 商户号
                    'mch_id' => $wechatInfo['pay_mch_id'],
                    // 合单 app_id
                    'combine_app_id' => '',
                    // 合单商户号
                    'combine_mch_id' => '',
                    // 商户秘钥
                    'mch_secret_key' => 'EREyEKU7scrRhqyk2kgQmGA5Bocrz7OA',
                    // 商户私钥
                    'mch_secret_cert' => '358172a80ce5c82d675740945d814698',
                    // 商户公钥证书路径
                    'mch_public_cert_path' => '',
                    // 微信公钥证书路径, optional
                    'wechat_public_cert_path' => [
                        '' => '',
                    ],
                    'mode' => Pay::MODE_SANDBOX,
                ]
            ],
            'logger' => [ // optional
                'enable' => false,
                'file' => './logs/wechat.log',
                'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
                'type' => 'single', // optional, 可选 daily.
                'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
            ],
            'http' => [ // optional
                'timeout' => 5.0,
                'connect_timeout' => 5.0,
                // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
            ],
        ];
    }

    public function handleData($resultInfo)
    {
        $pay['amount'] = [
            'total' => $resultInfo['money']*100,
        ];
        $pay['description'] = $resultInfo['subject'];
        $pay['out_trade_no'] = $resultInfo['out_trade_no'];
        $pay['notify_url'] = config('mall.notify_wechat') . $resultInfo['token'];
        return $pay;
    }

    public function sendPay($id)
    {
        $resultInfo = app(LogRepository::class)->find($id)['data'];
        return Pay::wechat($this->config($resultInfo['account_id']))->app($this->handleData($resultInfo));
    }

}
