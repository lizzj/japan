<?php

namespace App\Repositories\Transformers\Auth\Mall\Admin;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Lang;
use League\Fractal\TransformerAbstract;
use App\Models\Auth\Mall\Admin\Admin;

/**
 * Class AdminTransformer.
 *
 * @package namespace App\Repositories\Transformers\Auth\Mall\Admin;
 */
class AdminTransformer extends TransformerAbstract
{
    public function transform(Admin $model)
    {
        return [
            'id' => (int)$model->id,
            'name' => $model->name,
            'account' => $model->account,
            'avatar' => config('mall.url') . $model->avatar,
            'roles_id' => $model->roles_id,
            'last_login' => (int)$model->last_login,
            'status' => $model->status,
            'nickname' => $model->nickname,
            'openid' => $model->openid,
            'uuid' => $model->uuid,
            'sex' => $model->sex,
            'sex_lang' => $model->sex ? $this->processSex($model->sex) : null,
            'roles' => $model->roles ? $this->processRolesCode($model->roles) : null,
            'roles_lang' => $model->roles ? $this->processRolesLang($model->roles) : null,
            'introduction' => $model->introduction,
            'email' => $model->email,
            'phone' => $model->phone,
            'created_at' => $model->created_at,
        ];
    }

    public function processSex($data)
    {
        return Lang::get('mall::General/Option.General.Sex.' . $data);
    }

    public function processRolesCode($data)
    {
        return [
            $data['code']
        ];
    }

    public function processRolesLang($data)
    {
        return Arr::only($data->toArray(), ['name']);
    }
}
