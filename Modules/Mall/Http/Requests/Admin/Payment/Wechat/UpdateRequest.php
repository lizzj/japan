<?php

namespace Modules\Mall\Http\Requests\Admin\Payment\Wechat;

use Illuminate\Validation\Rule;
use Modules\Mall\Http\Requests\Admin\AdminRequest;

class UpdateRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $data = \request()->only('id');
        return [
            'action' => 'required|in:main,status',
            'name' => [
                'required_if:action,main',
                Rule::unique('system_payment_wechat')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'mch_id' => 'required_if:action,main',
            'scene_lang' => 'required_if:action,main',
            'mode' => 'required_if:action,main|in:0,2',
            'sub_mch_id' => 'required_if:mode,2',     //服务商模式需要
            'mch_public_cert_path' => 'required_if:action,main',
            'mch_secret_cert_file' => 'required_if:action,main',
            'mch_secret_key' => 'required_if:action,main',
            'sub_app_id' => 'present',   //app支付需要
            'sub_mini_app_id' => 'present', //小程序支付需要
            'sub_mp_app_id' => 'present',      //h5支付需要
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Payment.Wechat.Update';
    }
}
