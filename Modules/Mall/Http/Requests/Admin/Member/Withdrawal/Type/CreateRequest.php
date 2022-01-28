<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Type;

use Illuminate\Foundation\Http\FormRequest;
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
            'name' => 'required|unique:Modules\Mall\Entities\Member\Withdrawal\Type',
            'icon' => 'required',
            'code' => 'required|unique:Modules\Mall\Entities\Member\Withdrawal\Type',
        ];
    }

    public function lang()
    {
        return 'Member.Withdrawal.Type.Create';
    }
}
