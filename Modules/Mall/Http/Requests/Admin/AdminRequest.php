<?php

namespace Modules\Mall\Http\Requests\Admin;

use App\Exceptions\Exception\BaseException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
{
    /**
     * @param Validator $validator
     * @throws BaseException
     * @Notes:
     * @author: Je t'aime
     * @Time: 2021/7/616:13
     */
    protected function failedValidation(Validator $validator)
    {
        throw new BaseException('valid', ['message' => __($validator->errors()->first())]);
    }

    // 接语言文件
    public function messages()
    {
        return trans('mall::Admin/Valid.' . $this->lang());
    }
}
