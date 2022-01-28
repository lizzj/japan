<?php

namespace Modules\Mall\Http\Requests\Admin\System\Swipe;

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
            'link' => 'required|in:yes,no',
            'link_type' => 'required_if:link,yes',
            'link_id' => 'required_if:link,yes',
            'image' => 'required',
            'sort' => 'required|numeric|integer',
            'location' => 'required|in:index,category'
        ];
    }

    public function lang()
    {
        return 'System.Swipe.Create';
    }
}
