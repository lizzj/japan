<?php

namespace Modules\Mall\Repositories\Transformers\Member\Withdrawal;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Withdrawal\Config;


class ConfigTransformer extends TransformerAbstract
{
    public function transform(Config $model)
    {
        return [
            'id' => (int)$model->id,
            'description' => $model->description,
            'poundage' => (int)$model->poundage,
            'base_num' => (int)$model->base_num,
            'min_num' => (int)$model->min_num,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
