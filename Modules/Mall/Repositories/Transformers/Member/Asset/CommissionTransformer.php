<?php

namespace Modules\Mall\Repositories\Transformers\Member\Asset;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Member\Asset\Commission;


class CommissionTransformer extends TransformerAbstract
{
     public function transform(Commission $model)
    {
        return [
            'id' => (int)$model->id,
            'user_id' => (int)$model->user_id,
            'source' => $model->source,
            'source_lang' => $this->processSource($model->source),
            'before' => $model->before,
            'num' => $model->num,
            'after' => $model->after,
            'relate' => $model->relate,
            'relate_id' => $model->relate_id,
            'relate_lang' => $this->processRelate($model->relate, $model->relate_id),
            'content' => $model->content,
            'type' => $model->type,
            'type_lang' => $this->processType($model->type),
            'user' => $model->user ? $this->processUser($model->user) : null,
            'created_at' => $model->created_at,
        ];
    }

    public function processSource($data)
    {
        return Lang::get('mall::General/Option.Commission.Source.' . $data);
    }

    public function processType($data)
    {
        return Lang::get('mall::General/Option.General.Type.' . $data);
    }

    public function processUser($data)
    {
        return Arr::only($data->toArray(), ['name', 'phone']);
    }

    public function processRelate($relate, $id)
    {
        if ($relate === null) {
            return null;
        } else {
            return '待处理';
        }
    }
}
