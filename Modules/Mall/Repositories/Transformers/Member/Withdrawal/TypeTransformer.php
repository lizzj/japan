<?php

namespace Modules\Mall\Repositories\Transformers\Member\Withdrawal;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Withdrawal\Type;


class TypeTransformer extends TransformerAbstract
{
    public function transform(Type $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'icon' => config('mall.url') . $model->icon,
            'code' => $model->code,
            'verify' => $model->verify,
            'sort' => (int)$model->sort,
            'status' => $model->status,
            'default' => $model->default,
            'created_at' => $model->created_at,
        ];
    }
}
