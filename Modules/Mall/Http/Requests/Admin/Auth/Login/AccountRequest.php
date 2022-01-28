<?php

namespace Modules\Mall\Http\Requests\Admin\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Admin\AdminRequest;

class AccountRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'account' => 'required',
            'password' => 'required',
        ];
    }

    public function lang()
    {
        return 'Auth.Login.Account';
    }
}
