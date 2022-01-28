<?php

namespace Modules\Mall\Http\Requests\Client\Auth\Base;

use Modules\Mall\Http\Requests\Client\ClientRequest;

class InfoRequest extends ClientRequest
{
    public function rules()
    {
        return [
            'name' => 'required',
            'avatar' => 'required',
            'sex' => 'required|in:m,w'
        ];
    }

    public function lang()
    {
        return 'Auth.Base.Info';
    }
}
