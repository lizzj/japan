<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Asset;

use App\Exceptions\Exception\ErrorException;
use App\Repositories\Interfaces\System\Payment\LogRepository;
use App\Services\Payment\Alipay;
use App\Services\Payment\Wechat;
use Faker\Provider\Payment;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Http\Requests\Client\Member\Asset\Balance\PaymentRequest;
use Modules\Mall\Repositories\Interfaces\Member\Asset\BalanceRepository;
use Modules\Mall\Repositories\Interfaces\System\OnlineRepository;

class BalanceController extends ClientController
{
    public function __construct(BalanceRepository $balance, LogRepository $log,OnlineRepository $online)
    {
        $this->authId();
        $this->balance = $balance;
        $this->log = $log;
        $this->online = $online;
    }

    public function index()
    {
        //获取余额日志
        $year = \request()->year ?? date('Y');
        $month = \request()->month ?? date('m');
        $interval = monthFirstAndLast($year, $month);
        $user_id = $this->authId();
        $source = \request()->source;
        $type = \request()->type;
        $limit = \request()->limit ?? 20;
        $array = ArrayDetail(compact('user_id', 'source', 'type'));
        $this->apiDefault(['data' => $this->balance->selfList($array, $interval, $limit)]);
    }

    public function store(PaymentRequest $request)
    {
        $data = $request->validated();
        //购买的id,支付方式
        $onlineInfo = $this->online->find($data['online_id'])['data'];
        $logData = [
            'user_id' => $this->authId(),
            'money' => $onlineInfo['price'],
            'subject' => '在线充值',
            'relate_type' => 'online',
            'relate_id' => $data['online_id'],
        ];
        if ($result = $this->log->processLog($logData, $data['type'])) {
            switch ($data['type']) {
                case 'alipay':
                    return $this->paymentAlipay($result);
                    break;
                case 'wechat':
                    $this->paymentWechat($result);
                    break;
                default:
                    throw new ErrorException('ParameterException', arrayTransitionObject(['message' => '参数错误']));
            }
        }
        $this->Error(60015);
    }

    public function paymentAlipay($log_id)
    {
        $alipay = new Alipay();
        return $alipay->sendPay($log_id);
    }

    public function paymentWechat($log_id)
    {
        //调用微信支付
        $wechat = new Wechat();
        $wechat->sendPay($log_id);
    }
}
