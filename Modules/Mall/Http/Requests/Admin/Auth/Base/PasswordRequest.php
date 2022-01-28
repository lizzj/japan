<?php

namespace Modules\Mall\Http\Requests\Admin\Auth\Base;

use Illuminate\Foundation\Http\FormRequest;

class PasswordRequest extends FormRequest
{
     /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'old' => 'required|password',
            'password' => 'required|alpha_num|min:6|max:12',
            'confirm' => 'required|same:password',
        ];
    }

    public function lang()
    {
        return 'Auth.Base.Password';
    }
}
