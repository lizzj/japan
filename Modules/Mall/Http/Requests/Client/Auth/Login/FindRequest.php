<?php

namespace Modules\Mall\Http\Requests\Client\Auth\Login;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\System\Sms\Roster;
use Illuminate\Validation\Rule;
use Modules\Mall\Http\Requests\Client\ClientRequest;

class FindRequest extends ClientRequest
{
/**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => [
                'required',
                'regex:/^(13[0-9]|14[01456879]|15[0-3,5-9]|16[2567]|17[0-8]|18[0-9]|19[0-3,5-9])\d{8}$/',
                 Rule::notIn(Roster::where(['type'=>'black'])->pluck('phone')),
            ],
            'code' => 'required|digits:6',
            'password' => 'required|min:6|max:16|alpha_num'
        ];
    }

    public function lang()
    {
        return 'Auth.Login.Find';
    }
}
