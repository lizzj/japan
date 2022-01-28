<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Center\Member;

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
            'action' => 'required|in:level,balance,commission,status,password,parent',
            'level_id' => 'required_if:action,level',
            'type' => 'required_if:action,balance,commission|in:inc,dec',
            'num' => 'required_if:action,balance,commission|numeric|min:0',
            'status' => 'required_if:action,status|in:on,off',
            'password' => 'required_if:action,password|min:6|max:16|alpha_num',
            'confirm_password' => 'required_if:action,password|same:password',
            'parent' => 'required_if:action,parent|in:yes,no',
            'pid' => 'required_if:action,parent|integer|min:0',
        ];
    }

    public function lang()
    {
        return 'Member.Center.Member.Update';
    }
}
