<?php

namespace Modules\Mall\Repositories\Transformers\Article;

use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Article\Article;


class ArticleTransformer extends TransformerAbstract
{
    public function transform(Article $model)
    {
        return [
            'id' => (int)$model->id,
            'category_id' => $model->category_id,
            'name' => $model->name,
            'image' => $model->image ? config('mall.url') . $model->image : null,
            'short_description' => $model->short_description,
            'keywords' => $model->keywords,
            'content' => $model->content,
            'status' => $model->status,
            'sort' => (int)$model->sort,
            'click' => (int)$model->click,
            'default' => $model->default,
            'category' => $model->category ? $this->processCategory($model->category) : null,
            'created_at' => $model->created_at,
        ];
    }

    public function processCategory($category)
    {
        return Arr::only($category->toArray(), ['name']);
    }
}
