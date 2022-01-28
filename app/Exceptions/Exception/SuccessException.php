<?php

namespace App\Exceptions\Exception;

use App\Exceptions\Library\Success;
use Exception;
use Throwable;
use Illuminate\Support\Facades\Response;

class SuccessException
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
         $this->resData=$this->dispose($data);
         $this->resCode=$data['code'];
         $this->resMessage = Success::Code($data['code']);
         $this->resType='success';
    }
    public function dispose($data){
        $dataInfo=null;
        if(array_key_exists("data", $data) && $data['data']==null){
            $dataInfo=null;
        }elseif (array_key_exists("data", $data) && $data['data']!==null){
            $dataInfo=$data['data'];
        }elseif(array_key_exists(0,$data) && array_key_exists("option", $data[0])){
            $dataInfo=$data[0]['option'];
        }elseif(array_key_exists(0,$data) &&array_key_exists("data", $data[0]) && array_key_exists("meta", $data[0])){
            $dataInfo['list']=$data[0]['data'];
            $dataInfo['meta']=$data[0]['meta']['pagination'];
        }elseif(array_key_exists(0,$data) &&array_key_exists("data", $data[0]) && !array_key_exists("meta", $data[0])){
            $dataInfo=$data[0]['data'];
        }
       return $dataInfo;
    }
}
