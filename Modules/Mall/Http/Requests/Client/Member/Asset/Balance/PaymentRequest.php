<?php

namespace Modules\Mall\Http\Requests\Client\Member\Asset\Balance;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Client\ClientRequest;

class PaymentRequest extends ClientRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'online_id' => 'required|numeric',
            'type' => 'required|in:alipay,wechat'
        ];
    }

    public function lang()
    {
        return 'Member.Asset.Balance.Payment';
    }
}
