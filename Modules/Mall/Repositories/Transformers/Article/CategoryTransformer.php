<?php

namespace Modules\Mall\Repositories\Transformers\Article;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Article\Category;


class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'show' => $model->show,
            'sort' => (int)$model->sort,
            'status' => $model->status,
            'count' => (int)$model->count,
            'default' => $model->default,
            'created_at' => $model->created_at,
        ];
    }
}
