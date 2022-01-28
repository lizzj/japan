<?php

namespace Modules\Mall\Http\Requests\Admin\Remind\Aliyun;

use Illuminate\Foundation\Http\FormRequest;
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
            'status' => 'required|in:on,off',
            'url' => 'required_if:status,on',
            'secret' => 'required_if:status,on'
        ];
    }

    public function lang()
    {
        return 'Remind.Setting.Update';
    }
}
