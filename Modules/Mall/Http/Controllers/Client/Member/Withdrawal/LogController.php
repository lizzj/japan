<?php

namespace Modules\Mall\Http\Controllers\Client\Member\Withdrawal;

use Illuminate\Support\Facades\Http;
use Modules\Mall\Http\Controllers\Client\ClientController;
use Modules\Mall\Http\Requests\Client\Member\Withdrawal\Log\CreateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\ConfigRepository;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\LogRepository;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\TypeRepository;

class LogController extends ClientController
{
    public function __construct(LogRepository $log, ConfigRepository $config, TypeRepository $type, CommissionRepository $commission)
    {
        $this->log = $log;
        $this->authId();
        $this->config = $config;
        $this->type = $type;
        $this->commission = $commission;
    }

    public function index()
    {
        //年月
        $year = \request()->year ?? date('Y');
        $month = \request()->month ?? date('m');
        $interval = monthFirstAndLast($year, $month);
        $user_id = $this->authId();
        $audit = \request()->audit;
        $limit = \request()->limit ?? 20;
        $array = ArrayDetail(compact('user_id', 'audit'));
        $this->apiDefault(['data' => $this->log->selfList($array, $interval, $limit)]);

    }

    public function history()
    {
        $this->apiDefault(['data' => $this->log->take(1)->orderBy('id', 'desc')->findByField('user_id', $this->authId())]);
    }

    public function getConfig()
    {
        return $this->config->find(1)['data'];
    }

    public function getType($id)
    {
        $typeInfo = $this->type->find($id)['data'];
        if ($typeInfo['verify'] === 'yes') {
            return $typeInfo['code'];
        } else {
            return false;
        }
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        //验证是否满足最低和倍数
        //验证是否超过最低限制
        if ($data['withdrawal_num'] < $this->getConfig()['min_num']) {
            $this->Error(63001);
        }
        //验证是否倍数
        if ($data['withdrawal_num'] % $this->getConfig()['base_num'] !== 0) {
            $this->Error(63002);
        }
        if ($this->authInfo()->commission < $data['withdrawal_num']) {
            $this->Error(63003);
        }
        if ($result = $this->getType($data['type_id'])) {
            if ($this->verifyCard($data['account'], $result)) {
                $this->Error(63004);
            }
        }
        //生成log数据
        $logData = [
            'user_id' => $this->authId(),
            'type_id' => $data['type_id'],
            'name' => $data['name'],
            'account' => $data['account'],
            'withdrawal_num' => $data['withdrawal_num'],
            'withdrawal_poundage' => $data['withdrawal_num'] * $this->getConfig()['poundage'] / 100,
            'real_pay' => $data['withdrawal_num'] - ($data['withdrawal_num'] * $this->getConfig()['poundage'] / 100),
        ];
        $this->log->create($logData);
        $commissionData = [
            'user_id' => $this->authId(),
            'type' => 'dec',
            'num' => $data['withdrawal_num']
        ];
        $this->commission->processLog($commissionData, 5);
        $this->apiSpecial(20006);
    }

    public function verifyCard($account, $code)
    {
        $url = 'https://ccdcapi.alipay.com/validateAndCacheCardInfo.json?_input_charset=utf-8&cardNo=' . $account . '&cardBinCheck=true';
        $response = Http::timeout(5)->get($url);
        $data = json_decode($response->body(), true);
        if (!$data['validated']) {
            return true;
        }
        if ($data['bank'] !== $code) {
            return true;
        }
        return false;
    }
}
