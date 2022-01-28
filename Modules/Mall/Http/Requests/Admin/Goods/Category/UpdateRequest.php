<?php

namespace Modules\Mall\Http\Requests\Admin\Goods\Category;

use Illuminate\Validation\Rule;
use Modules\Mall\Http\Requests\Admin\AdminRequest;

class UpdateRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = \request()->only('id');
        return [
            'action' => 'required|in:main,status',
            'name' => [
                'required_if:action,main',
                Rule::unique('mall_goods_category')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'icon' => 'required_if:action,main',
            'sort' => 'required_if:action,main|integer|min:0',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Goods.Category.Update';
    }
}
