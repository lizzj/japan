<?php

namespace Modules\Mall\Http\Requests\Client\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Client\ClientRequest;
use App\Models\System\Sms\Roster;
use Illuminate\Validation\Rule;

class PhoneRequest extends ClientRequest
{
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'regex:/^(13[0-9]|14[01456879]|15[0-3,5-9]|16[2567]|17[0-8]|18[0-9]|19[0-3,5-9])\d{8}$/',
                Rule::notIn(Roster::where(['type' => 'black'])->pluck('phone')),
            ],
            'code' => 'required|digits:6',
        ];
    }

    public function lang()
    {
        return 'Auth.Login.Phone';
    }
}
