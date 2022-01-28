<?php

namespace Modules\Mall\Http\Requests\Client\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Client\ClientRequest;

class AccountRequest extends ClientRequest
{
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
