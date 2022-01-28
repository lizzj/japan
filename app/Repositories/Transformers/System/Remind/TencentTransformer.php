<?php

namespace App\Repositories\Transformers\System\Remind;

use League\Fractal\TransformerAbstract;
use App\Models\System\Remind\Tencent;

/**
 * Class TencentTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Remind;
 */
class TencentTransformer extends TransformerAbstract
{
    /**
     * Transform the Tencent entity.
     *
     * @param \App\Models\System\Remind\Tencent $model
     *
     * @return array
     */
    public function transform(Tencent $model)
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
