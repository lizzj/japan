<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Type;

use Illuminate\Foundation\Http\FormRequest;
use Modules\Mall\Http\Requests\Admin\AdminRequest;
use Illuminate\Validation\Rule;

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
            'action' => 'required|in:main,status,sort',
            'name' => [
                'required_if:action,main',
                Rule::unique('mall_member_withdrawal_type')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'code' => [
                'required_if:action,main',
                Rule::unique('mall_member_withdrawal_type')->ignore(array_key_exists('id', $data) ? $data['id'] : 0),
            ],
            'icon' => 'required_if:action,main',
            'sort' => 'required_if:action,sort|numeric|integer|min:0',
            'status' => 'required_if:action,status|in:on,off'
        ];
    }

    public function lang()
    {
        return 'Member.Withdrawal.Type.Update';
    }
}
