<?php

namespace App\Repositories\Transformers\Auth\Mall\Admin;

use League\Fractal\TransformerAbstract;
use App\Models\Auth\Mall\Admin\Roles;

/**
 * Class RolesTransformer.
 *
 * @package namespace App\Repositories\Transformers\Auth\Mall\Admin;
 */
class RolesTransformer extends TransformerAbstract
{
    public function transform(Roles $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'code' => $model->code,
            'count' => $model->count,
            'status' => $model->status,
            'created_at' => $model->created_at,
        ];
    }
}
