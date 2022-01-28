<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Config;

/**
 * Class ConfigTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class ConfigTransformer extends TransformerAbstract
{
    public function transform(Config $model)
    {
        return [
            'id' => (int)$model->id,
            'default' => $model->default,
            'throttle' => (int)$model->throttle,
            'threshold' => (int)$model->threshold,
            'verify' => (int)$model->verify,
            'created_at' => $model->created_at,
        ];
    }
}
