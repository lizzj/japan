<?php

namespace Modules\Mall\Http\Requests\Admin\System\Version;

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
            'action' => 'required|in:main,status,release,force',
            'log' => 'required_if:action,main|array',
            'log.*.option' => 'required_if:action,main|distinct:ignore_case',
            'status' => 'required_if:action,status|in:on,off',
            'release' => 'required_if:action,release|in:yes,no',
            'force' => 'required_if:action,force|in:yes,no',
        ];
    }

    public function lang()
    {
        return 'System.Version.Update';
    }
}
