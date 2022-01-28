<?php

namespace Modules\Mall\Repositories\Transformers\Goods;

use League\Fractal\TransformerAbstract;
use Modules\Mall\Entities\Goods\Category;


class CategoryTransformer extends TransformerAbstract
{
    public function transform(Category $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'pid' => (int)$model->pid,
            'sort' => (int)$model->sort,
            'status' => $model->status,
            'count' => (int)$model->count,
            'icon' => config('mall.url') . $model->icon,
            'level' => $this->getLevel($model->id, 1),
            'children' => $model->children ? $this->processChildren($model->children) : [],
            'created_at' => $model->created_at,
        ];
    }

    public function processChildren($data)
    {
        $result = [];
        for ($i = 0, $iMax = count($data); $i < $iMax; $i++) {
            $result[$i] = \Arr::only($data[$i]->toArray(), ['id', 'name', 'pid', 'sort', 'icon', 'count', 'children', 'status', 'created_at']);
            $result[$i]['icon'] = config('mall.url') . $result[$i]['icon'];
            $result[$i]['level'] = $this->getLevel($result[$i]['id'], 1);
            $result[$i]['children'] = $this->hasChild($result[$i]['id']) ? $this->processChildren($this->hasChild($result[$i]['id'])) : [];
        }
        return $result;
    }

    public function getLevel($id, $num)
    {
        $categoryInfo = Category::find($id);
        if ((int)$categoryInfo->pid === 0) {
            return $num;
        } else {
            return $this->getLevel($categoryInfo->pid, $num + 1);
        }
    }

    public function hasChild($id)
    {
        $info = Category::where(['pid' => $id])->get();
        if (!empty($info)) {
            return $info;
        } else {
            return false;
        }
    }
}
