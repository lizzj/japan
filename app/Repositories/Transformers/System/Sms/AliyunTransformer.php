<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Aliyun;

/**
 * Class AliyunTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class AliyunTransformer extends TransformerAbstract
{
    /**
     * Transform the Remind entity.
     *
     * @param \App\Models\System\Sms\Aliyun $model
     *
     * @return array
     */
    public function transform(Aliyun $model)
    {
        return [
            'id' => (int)$model->id,
            'key' => $model->key,
            'secret' => $model->secret,
            'url' => $model->url,
            'status' => $model->status,
            'created_at' => $model->created_at,
        ];
    }
}
