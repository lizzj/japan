<?php

namespace App\Exceptions\Exception;

use Exception;
use Throwable;

class BaseException extends Exception
{
    protected $type;
    protected $data;
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
        $this->type = $type;
        $this->data = $data;
    }

    public function report()
    {
        $resInfo = null;
        if ($this->type === 'success') {
            $resInfo = new  SuccessException($this->data);
        } elseif ($this->type === 'login') {
            $resInfo = new  AuthException($this->data);
        } elseif ($this->type === 'valid') {
            $resInfo = new  ValidException($this->data);
        } elseif ($this->type === 'send') {
            $resInfo = new SendException($this->data);
        }
        $this->resCode = $resInfo->resCode;
        $this->resMessage = $resInfo->resMessage;
        $this->resData = $resInfo->resData;
        $this->resType = $resInfo->resType;
    }
}
