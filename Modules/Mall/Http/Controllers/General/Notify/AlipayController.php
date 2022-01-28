<?php

namespace Modules\Mall\Http\Controllers\General\Notify;

use App\Models\System\Payment\Log;
use App\Services\Payment\Alipay;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use App\Jobs\System\Payment\Alipay as  NotifyAlipay;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Yansongda\Pay\Pay;

class AlipayController extends Controller
{
    public function notify(Request $request, $token)
    {
        Storage::append('./alipay/' . date('ymd') . '.log', json_encode($request->all(), JSON_UNESCAPED_UNICODE));
        $logInfo = Log::where(['token' => $token])->first();
        if ($logInfo) {
            $service = new  Alipay();
            $alipay = Pay::alipay($service->config($logInfo->account_id));
            try {
                $result = $alipay->callback(); // 是的，验签就这么简单！
                if ($result) {
                    if ($result['trade_status'] === 'TRADE_SUCCESS') {
                        NotifyAlipay::dispatch($token, $result);
                    }
                } else {
                    return '支付失败';
                }
            } catch (\Exception $e) {
                // $e->getMessage();
            }
           return $alipay->success();
        }
        return '支付失败';
    }
}
