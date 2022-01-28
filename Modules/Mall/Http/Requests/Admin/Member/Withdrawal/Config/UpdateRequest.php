<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Config;

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
            'description' => 'required',
            'poundage' => 'required|numeric|integer|min:0|max:100',
            'min_num' => 'required|numeric|integer|min:1',
            'base_num' => 'required|numeric|integer|min:1|max:100',
        ];
    }

    public function lang()
    {
        return 'Member.Withdrawal.Config.Update';
    }
}
