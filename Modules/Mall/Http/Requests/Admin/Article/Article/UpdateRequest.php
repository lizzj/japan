<?php

namespace Modules\Mall\Http\Requests\Admin\Article\Article;

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
        return [
            'action' => 'required|in:main,status,sort',
            'name' => 'required_if:action,main',
            'keywords' => 'required_if:action,main|array',
            'short_description' => 'required_if:action,main',
            'content' => 'required_if:action,main',
            'image' => 'required_if:action,main',
            'category_id' => 'required_if:action,main',
            'sort' => 'required_if:action,sort|integer|min:0',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Article.Article.Update';
    }

}
