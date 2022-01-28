<?php

namespace Modules\Mall\Repositories\Transformers\Member\Withdrawal;

use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Withdrawal\Log;


class LogTransformer extends TransformerAbstract
{
    public function transform(Log $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            'type_id' => (int)$model->type_id,
            'type' => $model->type ? $this->processType($model->type) : null,
            'name' => $model->name,
            'account' => $model->account,
            'withdrawal_num' => $model->withdrawal_num,
            'withdrawal_poundage' => $model->withdrawal_poundage,
            'real_pay' => $model->real_pay,
            'audit' => $model->audit,
            'audit_at' => $model->audit_at,
            'audit_result' => $model->audit_result,
            'remark' => $model->remark,
            'user' => $model->user ? $this->processUser($model->user) : null,
            'created_at' => $model->created_at,
        ];
    }

    public function processType($data)
    {
        return Arr::only($data->toArray(), ['name']);
    }

    public function processUser($data)
    {
        return Arr::only($data->toArray(), ['name', 'phone']);
    }
}
