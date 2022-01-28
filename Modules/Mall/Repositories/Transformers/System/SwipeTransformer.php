<?php

namespace Modules\Mall\Repositories\Transformers\System;

use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\System\Swipe;


class SwipeTransformer extends TransformerAbstract
{
    public function transform(Swipe $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'link' => $model->link,
            'link_type' => $model->link_type,
            'link_id' => (int)$model->link_id,
            'link_desc' => $model->link === 'yes' ? $this->processLink($model->link_type, $model->link_id) : null,
            'image' => config('mall.url') . $model->image,
            'sort' => (int)$model->sort,
            'status' => $model->status,
            'location' => $model->location,
            'location_lang' => $this->processLocation($model->location),
            'created_at' => $model->created_at,
        ];
    }

    public function processLink($type, $id)
    {
        return '待处理';
    }

    public function processLocation($data)
    {
        return Lang::get('mall::General/Option.System.Swipe.Location.' . $data);
    }
}
