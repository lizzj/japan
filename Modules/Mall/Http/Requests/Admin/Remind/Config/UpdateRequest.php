<?php

namespace Modules\Mall\Http\Requests\Admin\Remind\Config;

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
            'frequency'=>'required_if:status,on|integer|min:1',
            'default'=>'required_if:status,on|in:aliyun,tencent',
            'week'=>'required_if:status,on|array',
            'hour'=>'required_if:status,on|array',
        ];
    }

    public function lang()
    {
        return 'Remind.Config.Update';
    }

}
