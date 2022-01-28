<?php

namespace Modules\Mall\Http\Requests\Admin\Article\Article;

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
            'name' => 'required',
            'keywords' => 'required|array',
            'short_description' => 'required',
            'content' => 'required',
            'image' => 'present',
            'category_id' => 'required'
        ];
    }

    public function lang()
    {
        return 'Article.Article.Create';
    }
}
