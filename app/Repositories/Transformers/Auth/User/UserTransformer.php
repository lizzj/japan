<?php

namespace App\Repositories\Transformers\Auth\User;

use App\Models\Auth\User\User;
use Illuminate\Support\Arr;
use League\Fractal\TransformerAbstract;

/**
 * Class UserTransformer.
 *
 * @package namespace App\Repositories\Transformers\Auth\User;
 */
class UserTransformer extends TransformerAbstract
{
    public function transform(User $model)
    {
        return [
            'id' => (int)$model->id,
            'account' => $model->account,
            'avatar' => config('mall.url') . $model->avatar,
            'name' => $model->name,
            'phone' => $model->phone,
            'original' => $model->original,
            'level_id' => (int)$model->level_id,
            'pid' => (int)$model->pid,
            'token' => $model->token,
            'last_login' => $model->last_login,
            'balance' => $model->balance,
            'commission' => $model->commission,
            'expense' => $model->expense,
            'recharge' => $model->recharge,
            'status' => $model->status,
            'is_active' => $model->is_active,
            'remote' => $model->name . '--' . $model->phone,
            'lower' => $this->processLower($model->id),
            'level' => $model->level ? $this->processLevel($model->level) : null,
            'parent' => $model->parent ? $this->processParent($model->parent) : null,
            'created_at' => $model->created_at,
        ];
    }

    public function processLevel($data)
    {
        $result = Arr::only($data->toArray(), ['name', 'weight', 'discount', 'icon']);
        $result['icon'] = config('mall.url') . $result['icon'];
        return $result;
    }

    public function processParent($data)
    {
        return Arr::only($data->toArray(), ['name', 'phone']);
    }

    public function processLower($id)
    {
        return User::where(['pid' => $id])->count();
    }
}
