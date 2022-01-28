<?php

namespace App\Exceptions\Exception;

use App\Exceptions\Library\Valid;
use Exception;
use Throwable;

class ValidException
{
    private $data;
    // 状态码
    public $resCode;
    // 提示信息
    public $resMessage;
    // 返回信息
    public $resData;
    // 返回类型
    public $resType;
    public function __construct($data)
    {
         $this->resData = null;
         $this->resCode=array_key_exists("code", $data)?$data['code']:60001;
         $this->resMessage =array_key_exists("message", $data)?$data['message']:Valid::Code($data['code']);
         $this->resType='valid';
    }
}
