<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Log;

use Illuminate\Foundation\Http\FormRequest;
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
        return [
            'audit' => 'required|in:pass,reject',
            'audit_result' => 'required_if:audit,reject',
        ];
    }

    public function lang()
    {
        return 'Member.Withdrawal.Log.Update';
    }
}
