<?php

namespace Modules\Mall\Http\Requests\Client\Member\Withdrawal\Log;

use Illuminate\Foundation\Http\FormRequest;
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
            'withdrawal_num' => 'required|numeric|min:0',
            'type_id' => 'required|numeric',
            'name' => 'required',
            'account' => 'required',
        ];
    }

    public function lang()
    {
        return 'Member.Withdrawal.Log.Create';
    }
}
