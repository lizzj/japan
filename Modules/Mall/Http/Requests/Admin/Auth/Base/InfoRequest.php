<?php

namespace Modules\Mall\Http\Requests\Admin\Auth\Base;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Admin\AdminRequest;
use App\Models\System\Sms\Roster;
use Illuminate\Validation\Rule;

class InfoRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'avatar' => 'required',
            'phone' => [
                'required',
                'regex:/^(13[0-9]|14[01456879]|15[0-3,5-9]|16[2567]|17[0-8]|18[0-9]|19[0-3,5-9])\d{8}$/',
                Rule::notIn(Roster::where(['type' => 'black'])->pluck('phone')),
            ],
            'email' => [
                'required',
                'regex:/^[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*@[a-zA-Z0-9]+([-_.][a-zA-Z0-9]+)*\.[a-z]{2,}$/'
            ]
        ];
    }

    public function lang()
    {
        return 'Auth.Base.Info';
    }
}
