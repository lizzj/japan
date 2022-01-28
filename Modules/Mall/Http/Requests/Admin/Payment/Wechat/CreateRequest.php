<?php

namespace Modules\Mall\Http\Requests\Admin\Payment\Wechat;

use Modules\Mall\Http\Requests\Admin\AdminRequest;

class CreateRequest extends AdminRequest
{
//     'mch_id', 'mch_public_cert_path', 'mch_secret_cert', 'mch_secret_cert_file', 'mch_secret_key', 'mode', 'mode_type', 'name', 'scene', 'status', 'sub_app_id', 'sub_mch_id', 'sub_mini_app_id', 'sub_mp_app_id'


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:App\Models\System\Payment\Wechat',
            'mch_id' => 'required',
            'mode' => 'required|in:0,2',
            'sub_mch_id' => 'required_if:mode,2',     //服务商模式需要
            'mch_public_cert_path' => 'required',
            'mch_secret_cert_file' => 'required',
            'mch_secret_key' => 'required',
            'sub_app_id' => 'present',   //app支付需要
            'sub_mini_app_id' => 'present', //小程序支付需要
            'sub_mp_app_id' => 'present',      //h5支付需要
            'scene_lang' => 'required|array',   //包含的使用场景
        ];
    }

    public function lang()
    {
        return 'Payment.Wechat.Create';
    }
}
