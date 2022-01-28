<?php

namespace Modules\Mall\Http\Requests\Admin\System\Notice;

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
            'action' => 'required|in:main,status',
            'name' => 'required_if:action,main',
            'link' => 'required_if:action,main|in:yes,no',
            'link_type' => 'required_if:link,yes',
            'link_id' => 'required_if:link,yes',
            'status' => 'required_if:action,status',
        ];
    }

    public function lang()
    {
        return 'System.Notice.Update';
    }
}
