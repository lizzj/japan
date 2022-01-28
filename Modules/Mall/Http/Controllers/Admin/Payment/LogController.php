<?php

namespace Modules\Mall\Http\Controllers\Admin\Payment;

use App\Repositories\Interfaces\System\Payment\LogRepository;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;

class LogController extends AdminController
{
    private LogRepository $log;

    public function __construct(LogRepository $log)
    {
        $this->authId();
        $this->log = $log;
    }

    public function search()
    {
        $title = \request()->title;
        $limit = \request()->limit ?? 20;
        $start_at = request()->start_at ?? 0;
        $end_at = request()->end_at ?? time();
        $account_type = \request()->option;
        $user_id = \request()->user;
        $relate_type = \request()->type;
        $interval = [$start_at, $end_at];
        $array = ArrayDetail(compact('account_type', 'relate_type', 'user_id'));
        return compact('title', 'array', 'limit', 'interval');
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->log->adminList($this->search())]);
    }

    public function export()
    {
        $data = $this->log->exportList($this->search());
        if (count($data) === 0) {
            $this->Error(60018);
        } else {
            //构造数据
            $excel_name = date('Ymd', time()) . '-支付日志';
            $excel_header = ["支付方式", "收款账号","姓名", "手机号码", '订单编号', "支付金额", '处理时间'];
            $excel_data = [];
            foreach ($data['data'] as $item) {
                $excel_data[] = [
                    '支付方式' => $item['account_type_lang'],
                    '收款账号' => $item['account']['name'],
                    '姓名' => $item['user']['name'],
                    '手机号码' => $item['user']['phone'],
                    '订单编号' => $item['out_trade_no'],
                    '支付金额' => $item['money'],
                    '处理时间' => date('Y-m-d H:i:s', $item['notify_at']),
                ];
            }
            $data = compact('excel_name', 'excel_header', 'excel_data');
            $this->apiDefault(['data' => $data]);
        }
    }
}
