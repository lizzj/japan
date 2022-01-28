<?php

namespace Modules\Mall\Http\Requests\Admin\Goods\Category;

use Modules\Mall\Http\Requests\Admin\AdminRequest;

class CreateRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:Modules\Mall\Entities\Goods\Category',
            'icon' => 'required',
            'pid' => 'required|integer|min:0',
            'sort' => 'required|integer|min:0',
        ];
    }

    public function lang()
    {
        return 'Goods.Category.Create';
    }
}
