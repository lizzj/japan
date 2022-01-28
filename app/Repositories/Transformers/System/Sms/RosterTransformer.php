<?php

namespace App\Repositories\Transformers\System\Sms;

use League\Fractal\TransformerAbstract;
use App\Models\System\Sms\Roster;

/**
 * Class RosterTransformer.
 *
 * @package namespace App\Repositories\Transformers\System\Sms;
 */
class RosterTransformer extends TransformerAbstract
{
    /**
     * Transform the Roster entity.
     *
     * @param \App\Models\System\Sms\Roster $model
     *
     * @return array
     */
    public function transform(Roster $model)
    {
        return [
            'id' => (int)$model->id,
            'phone' => $model->phone,
            'type' => $model->type,
            'remark' => $model->remark,
            'modules' => $model->modules,
            'created_at' => $model->created_at,
        ];
    }
}
