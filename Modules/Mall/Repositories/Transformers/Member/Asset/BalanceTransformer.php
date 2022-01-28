<?php

namespace Modules\Mall\Repositories\Transformers\Member\Asset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Asset\Balance;
use Modules\Mall\Entities\Order\Order;


class BalanceTransformer extends TransformerAbstract
{
    public function transform(Balance $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            'source' => $model->source,
            'source_lang' => $this->processSource($model->source),
            'before' => $model->before,
            'num' => $model->num,
            'after' => $model->after,
            'relate' => $model->relate,
            'relate_id' => $model->relate_id,
            'relate_lang' => $this->processRelate($model->relate, $model->relate_id),
            'content' => $model->content,
            'type' => $model->type,
            'type_lang' => $this->processType($model->type),
            'user' => $model->user ? $this->processUser($model->user) : null,
            'created_at' => $model->created_at,
        ];
    }

    public function processSource($data)
    {
        return Lang::get('mall::General/Option.Balance.Source.' . $data);
    }

    public function processType($data)
    {
        return Lang::get('mall::General/Option.General.Type.' . $data);
    }

    public function processUser($data)
    {
        return Arr::only($data->toArray(), ['name', 'phone']);
    }

    public function processRelate($relate, $id)
    {
//        if ($relate === 'order') {
//            return '订单编号 :' . Order::find($id)->order_no;
//        } elseif ($relate === 'online') {
//            return '在线充值 :' . Online::find($id)->name;
//        }
        return '待处理';
    }
}
