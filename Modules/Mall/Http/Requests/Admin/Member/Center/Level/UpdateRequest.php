<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Center\Level;

use Illuminate\Validation\Rule;
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
        $data = \request()->only('id');
        return [
            'action' => 'required|in:main,status',
            'name' => [
                'required_if:action,main',
                Rule::unique('auth_user_level')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'icon' => 'required_if:action,main',
            'weight' => [
                'required_if:action,main',
                'min:0',
                'integer',
                Rule::unique('auth_user_level')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'description' => 'required_if:action,main',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Member.Center.Level.Update';
    }
}
