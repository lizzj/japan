<?php

namespace App\Repositories\Transformers\System\Remind;

use App\Models\System\Remind\Config;
use League\Fractal\TransformerAbstract;

/**
 * Class ConfigTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Remind;
 */
class ConfigTransformer extends TransformerAbstract
{
    /**
     * Transform the Config entity.
     *
     * @param \App\Models\System\Remind\Config $model
     *
     * @return array
     */
    public function transform(Config $model)
    {
        return [
            'id' => (int)$model->id,
            'frequency' => $model->frequency,
            'default' => $model->default,
            'status' => $model->status,
            'week' => $model->week,
            'hour' => $model->hour,
            'next_at' => $model->next_at,
            'created_at' => $model->created_at];
    }
}
