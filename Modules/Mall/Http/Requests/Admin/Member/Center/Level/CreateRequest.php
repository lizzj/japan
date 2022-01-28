<?php

namespace Modules\Mall\Http\Requests\Admin\Member\Center\Level;

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
            'name' => 'required|unique:App\Models\Auth\User\Level',
            'icon' => 'required',
            'weight' => 'required|min:0|integer|unique:App\Models\Auth\User\Level',
            'description' => 'required'
        ];
    }

    public function lang()
    {
        return 'Member.Center.Level.Create';
    }
}
