<?php

namespace Modules\Mall\Http\Requests\Admin\Payment\Alipay;

use Modules\Mall\Http\Requests\Admin\AdminRequest;

class CreateRequest extends AdminRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|unique:App\Models\System\Payment\Alipay',
            'app_id' => 'required',
            'mode' => 'required|in:0,2',
            'service_provider_id' => 'required_if:mode,2',
            'app_secret_cert_file' => 'required',
            'app_public_cert_path' => 'required',
            'alipay_public_cert_path' => 'required',
            'alipay_root_cert_path' => 'required',
            'scene_lang' => 'required|array',
        ];
    }

    public function lang()
    {
        return 'Payment.Alipay.Create';
    }
}
