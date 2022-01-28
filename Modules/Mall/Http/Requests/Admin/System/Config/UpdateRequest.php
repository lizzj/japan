<?php

namespace Modules\Mall\Http\Requests\Admin\System\Config;

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
            'name' => 'required',
            'logo' => 'required',
            'company' => 'required',
            'description' => 'required',
            'service_phone' => 'required',
            'service_qrcode' => 'required',
            'service_time' => 'required',
        ];
    }

    public function lang()
    {
        return 'System.Config.Update';
    }
}
