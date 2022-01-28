<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Log;

/**
 * Class LogTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class LogTransformer extends TransformerAbstract
{
    /**
     * Transform the Log entity.
     *
     * @param \App\Models\System\Sms\Log $model
     *
     * @return array
     */
    public function transform(Log $model)
    {
        return [
            'id' => (int)$model->id,
            'phone' => $model->phone,
            'template_id' => $model->template_id,
            'type' => $model->type,
            'content' => $model->content,
            'verify' => $model->verify,
            'send_at' => $model->send_at,
            'send_code' => $model->send_code,
            'send_msg' => $model->send_msg,
            'operator' => $model->operator,
            'modules' => $model->modules,
            'created_at' => $model->created_at,
        ];
    }
}
