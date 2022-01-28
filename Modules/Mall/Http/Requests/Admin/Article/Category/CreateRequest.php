<?php

namespace Modules\Mall\Http\Requests\Admin\Article\Category;

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
            'name' => 'required|unique:Modules\Mall\Entities\Article\Category',
            'show' => 'required|in:on,off',
            'sort' => 'required|integer|min:0',
        ];
    }

    public function lang()
    {
        return 'Article.Category.Create';
    }
}
