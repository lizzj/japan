<?php

namespace App\Repositories\Transformers\System\Remind;

use League\Fractal\TransformerAbstract;
use App\Models\System\Remind\Log;

/**
 * Class LogTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Remind;
 */
class LogTransformer extends TransformerAbstract
{
    /**
     * Transform the Log entity.
     *
     * @param \App\Models\System\Remind\Log $model
     *
     * @return array
     */
    public function transform(Log $model)
    {
        return [
            'id' => (int)$model->id,
            'message' => $model->message,
            'operator' => $model->operator,
            'send' => $model->send,
            'send_at' => $model->send_at,
            'code' => $model->code,
            'send_msg' => $model->send_msg,
            'send_code' => $model->send_code,
            'created_at' => $model->created_at,
        ];
    }
}
