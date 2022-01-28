<?php

namespace App\Repositories\Transformers\System\Payment;

use App\Models\System\Payment\Alipay;
use App\Models\System\Payment\Wechat;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use App\Models\System\Payment\Log;

/**
 * Class LogTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Payment;
 */
class LogTransformer extends TransformerAbstract
{
    /**
     * Transform the Log entity.
     *
     * @param \App\Models\System\Payment\Log $model
     *
     * @return array
     */
    public function transform(Log $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            'account_id' => (int)$model->account_id,
            'money' => $model->money,
            'notify_at' => (int)$model->notify_at,
            'account_type' => $model->account_type,
            'account_type_lang' => $this->processOption($model->account_type),
            'out_trade_no' => $model->out_trade_no,
            'relate_type' => $model->relate_type,
            'relate_type_lang' => $this->processType($model->relate_type),
            'relate_id' => (int)$model->relate_id,
            'result' => $model->result,
            'status' => $model->status,
            'subject' => $model->subject,
            'token' => $model->token,
            'user' => $model->user ? $this->processUser($model->user) : null,
            'account' => $this->processAccount($model->account_id, $model->account_type),
            'created_at' => $model->created_at,
        ];
    }

    public function processUser($data)
    {
        return Arr::only($data->toArray(), ['name', 'phone']);
    }

    public function processOption($data)
    {
        return Lang::get('mall::General/Option.Payment.Option.' . $data);
    }

    public function processType($data)
    {
        return Lang::get('mall::General/Option.Payment.Type.' . $data);
    }

    public function processAccount($account_id, $account_type)
    {
        //根据option来进行划分
        if ($account_type === 'wechat') {
            $res['name'] = Wechat::find($account_id)->name;
        } elseif ($account_type === 'alipay') {
            $res['name'] = Alipay::find($account_id)->name;
        } else {
            $res['name'] = null;
        }
        return $res;
    }
}
