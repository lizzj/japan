<?php

namespace App\Exceptions\Exception;

use App\Exceptions\Library\Error;
use Exception;

class ErrorException extends Exception
{
    private $data;
    private $type;
    // 状态码
    public $resCode;
    // 提示信息
    public $resMessage;
    // 返回信息
    public $resData;
    // 返回类型
    public $resType;

    public function __construct($type, $data)
    {
        $info = Error::errMsg($type);
        $this->resCode = $info['code'];
//        $this->resData = is_null($data->message) ? $info['msg'] : $data->message;
        $this->resData = is_null($data->message) ? $info['msg'] : null;
        $this->resMessage = $info['msg'];
        $this->resType = 'error';
    }

}
