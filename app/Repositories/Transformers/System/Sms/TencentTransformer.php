<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Tencent;

/**
 * Class TencentTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class TencentTransformer extends TransformerAbstract
{
    /**
     * Transform the Tencent entity.
     *
     * @param \App\Models\System\Sms\Tencent $model
     *
     * @return array
     */
    public function transform(Tencent $model)
    {
        return [
            'id'         => (int) $model->id,

            /* place your other model properties here */

            'created_at' => $model->created_at,
            'updated_at' => $model->updated_at
        ];
    }
}
