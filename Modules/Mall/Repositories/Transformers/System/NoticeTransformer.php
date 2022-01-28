<?php

namespace Modules\Mall\Repositories\Transformers\System;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\System\Notice;


class NoticeTransformer extends TransformerAbstract
{
    public function transform(Notice $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'link' => $model->link,
            'link_type' => $model->link_type,
            'link_id' => $model->link_id,
            'link_desc' => $model->link === 'yes' ? $this->processLink($model->link_type, $model->link_id) : null,
            'status' => $model->status,
            'sort' => (int)$model->sort,
            'created_at' => $model->created_at,
        ];
    }

    public function processLink($type, $id)
    {
        return '待处理';
    }
}
