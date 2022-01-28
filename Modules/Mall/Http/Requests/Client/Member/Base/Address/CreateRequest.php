<?php

namespace Modules\Mall\Http\Requests\Client\Member\Base\Address;

use Modules\Mall\Http\Requests\Client\ClientRequest;

class CreateRequest extends ClientRequest
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
            'phone' => [
                'required',
                'regex:/^(13[0-9]|14[01456879]|15[0-3,5-9]|16[2567]|17[0-8]|18[0-9]|19[0-3,5-9])\d{8}$/',
            ],
            'province' => 'required',
            'city' => 'required',
            'area' => 'required',
            'address' => 'required',
            'default' => 'required|in:yes,no',
        ];
    }

    public function lang()
    {
        return 'Member.Base.Address.Create';
    }
}
