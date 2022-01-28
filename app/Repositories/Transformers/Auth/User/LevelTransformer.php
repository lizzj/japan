<?php

namespace App\Repositories\Transformers\Auth\User;

use App\Models\Auth\User\Level;
use League\Fractal\TransformerAbstract;

/**
 * Class LevelTransformer.
 *
 * @package namespace App\Repositories\Transformers\Auth\User;
 */
class LevelTransformer extends TransformerAbstract
{
    public function transform(Level $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'weight' => (int)$model->weight,
            'icon' => config('mall.url') . $model->icon,
            'count' => (int)$model->count,
            'status' => $model->status,
            'default' => $model->default,
            'description' => $model->description,
            'created_at' => $model->created_at,
        ];
    }
}
