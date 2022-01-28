<?php

namespace App\Repositories\Transformers\System\Remind;

use League\Fractal\TransformerAbstract;
use App\Models\System\Remind\Aliyun;

/**
 * Class AliyunTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Remind;
 */
class AliyunTransformer extends TransformerAbstract
{
    /**
     * Transform the Remind entity.
     *
     * @param \App\Models\System\Remind\Aliyun $model
     *
     * @return array
     */
    public function transform(Aliyun $model)
    {
        return [
            'id' => (int)$model->id,
            'url' => $model->url,
            'secret' => $model->secret,
            'status' => $model->status,
            'created_at' => $model->created_at
        ];
    }
}
