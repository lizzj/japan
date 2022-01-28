<?php

namespace Modules\Mall\Http\Requests\Admin\System\Online;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Admin\AdminRequest;
use Illuminate\Validation\Rule;

class UpdateRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = \request()->only('id');
        return [
            'action' => 'required|in:main,status,sort',
            'name' => [
                'required_if:action,main',
                Rule::unique('mall_system_online')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'price' => [
                'required_if:action,main',
                'numeric',
                'min:0',
                Rule::unique('mall_system_online')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'actual' => 'required_if:action,main|numeric|min:0',
            'tip' => 'present',
            'sort' => 'required_if:action,sort|integer|numeric|min:0',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'System.Online.Update';
    }
}
