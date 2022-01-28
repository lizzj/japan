<?php

namespace Modules\Mall\Http\Requests\Admin\System\Online;

use Illuminate\Foundation\Http\FormRequest;
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
            'name' => 'required|unique:Modules\Mall\Entities\System\Online',
            'price' => 'required|numeric|min:0|unique:Modules\Mall\Entities\System\Online',
            'actual' => 'required|numeric|min:0',
            'tip' => 'present',
        ];
    }

    public function lang()
    {
        return 'System.Online.Create';
    }
}
