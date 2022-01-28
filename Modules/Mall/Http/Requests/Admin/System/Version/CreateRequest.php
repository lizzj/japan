<?php

namespace Modules\Mall\Http\Requests\Admin\System\Version;

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
            'version' => 'required|unique:Modules\Mall\Entities\System\Version,version',
            'log' => 'required|array',
            'log.*.option' => 'distinct:ignore_case',
            'platform' => 'required|in:android,ios',
            'url' => 'required',
        ];
    }

    public function lang()
    {
        return 'System.Version.Create';
    }
}
