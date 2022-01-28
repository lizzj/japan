<?php

namespace App\Exceptions\Exception;

use App\Exceptions\Library\Auth;
use Exception;

class AuthException
{
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
         if (is_null($data['data'])) {
             $this->resData = null;
          }else{
             $this->resData=$data['data'];
         }
        $this->resCode = $data['code'] ?: 50010;
        $this->resMessage = Auth::Code($data['code']);
        $this->resType = 'login';
    }
}

