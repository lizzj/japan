<?php

namespace Modules\Mall\Http\Requests\Admin\Payment\Alipay;

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
                Rule::unique('system_payment_alipay')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'app_id' => 'required_if:action,main',
            'scene_lang' => 'required_if:action,main',
            'mode' => 'required_if:action,main|in:0,2',
            'service_provider_id' => 'required_if:mode,2',
            'app_secret_cert_file' => 'required_if:action,main',
            'app_public_cert_path' => 'required_if:action,main',
            'alipay_public_cert_path' => 'required_if:action,main',
            'alipay_root_cert_path' => 'required_if:action,main',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Payment.Alipay.Update';
    }
}
