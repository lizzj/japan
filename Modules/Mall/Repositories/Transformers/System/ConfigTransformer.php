<?php

namespace Modules\Mall\Repositories\Transformers\System;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\System\Config;


class ConfigTransformer extends TransformerAbstract
{
    public function transform(Config $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'logo' => config('mall.url') . $model->logo,
            'company'=>$model->company,
            'description'=>$model->description,
            'service_phone'=>$model->service_phone,
            'service_qrcode'=>config('mall.url') .$model->service_qrcode,
            'service_time'=>$model->service_time,
            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at,
        ];
    }
}
