<?php

namespace Modules\Mall\Repositories\Transformers\System;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\System\Online;


class OnlineTransformer extends TransformerAbstract
{
    public function transform(Online $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'price' => $model->price,
            'actual' => $model->actual,
            'sort' => (int)$model->sort,
            'tip' => $model->tip ?? ' ',
            'status' => $model->status,
            'created_at' => $model->created_at,
        ];
    }
}
