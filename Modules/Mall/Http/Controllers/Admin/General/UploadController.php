<?php

namespace Modules\Mall\Http\Controllers\Admin\General;

use App\Exceptions\Exception\BaseException;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;

class UploadController extends Controller
{
    protected function Success($result)
    {
        throw new BaseException('success', $result);
    }

    protected function Error($code)
    {
        throw new BaseException('valid', ['data' => null, 'code' => $code]);
    }

    public function process($resImage, $folder)
    {
        if ($folder === null) {
            $folder_path = '/Uploads';
            $image_name_prefix = 'Uploads';
        } else {
            $folder_ary = explode("#", $folder);
            $image_name_prefix = end($folder_ary);
            $folder_path = '';
            for ($i = 0, $iMax = count($folder_ary); $i < $iMax; $i++) {
                $folder_path .= '/' . $folder_ary[$i];
            }
        }
        $savePath = config('mall.create_path') . $folder_path . '/' . date("ymd") . '/';
        File::isDirectory($savePath) or File::makeDirectory($savePath, 0777, true, true);
        $mimeType = explode("/", $resImage->getMimeType())[0];
        $size = $resImage->getSize();
        if ($mimeType !== 'image') {
            $this->Error(61002);
        }
        if ($size > 5242880) {
            $this->Error(61003);
        }
        $hou = $resImage->getClientOriginalExtension();
        $filename = $image_name_prefix . date("YmdHis") . random_int(100, 999) . '.' . $hou;
        $resImage->move($savePath, $filename);
        return '/' . $savePath . $filename;
    }

    public function image(Request $request)
    {
        if (!$request->hasFile('image')) {
            $this->Error(61001);
        }
        $folder = $request->input('folder');
        //字符串转数组
        $resImage = $request->file('image');
        $path = $this->process($resImage, $folder);
        $data = compact('path');
        $this->Success(['data' => $data, 'code' => 20004]);
    }

    public function editor(Request $request)
    {
        if (!$request->hasFile('image')) {
            $this->Error(61001);
        }
        $folder = $request->input('folder');
        //字符串转数组
        $resImage = $request->file('image');
        $path = config('mall.url') . $this->process($resImage, $folder);
        $data = compact('path');
        $this->Success(['data' => $data, 'code' => 20004]);
    }

    public function alipay(Request $request)
    {
        if (!$request->hasFile('file')) {
            $this->Error(61001);
        }
        if ($request->file('file')->getSize() > 20971520) {
            $this->error(61003);
        }
        $savePath = config('mall.alipay_pay_path') . '/' . date("ymd") . '/' . time() . '/';
        File::isDirectory($savePath) or File::makeDirectory($savePath, 0777, true, true);
        $name = $request->file('file')->getClientOriginalName();
        $request->file('file')->move($savePath, $name);
        $path = './' . $savePath . $name;
        $data = compact('path');
        $this->Success(['data' => $data, 'code' => 20004]);
    }

    public function wechat(Request $request)
    {
        if (!$request->hasFile('file')) {
            $this->Error(61001);
        }
        if ($request->file('file')->getSize() > 20971520) {
            $this->error(61003);
        }
        $savePath = config('mall.wechat_pay_path') . '/' . date("ymd") . '/' . time() . '/';
        File::isDirectory($savePath) or File::makeDirectory($savePath, 0777, true, true);
        $name = $request->file('file')->getClientOriginalName();
        $request->file('file')->move($savePath, $name);
        $path = './' . $savePath . $name;
        $data = compact('path');
        $this->Success(['data' => $data, 'code' => 20004]);
    }

    public function apk(Request $request)
    {
        if (!$request->hasFile('file')) {
            $this->Error(61004);
        }
        if ($request->file('file')->getSize() > 104857600) {
            $this->Error(61003);
        }
        $savePath = config('mall.apk_path') . '/' . date("ymd") . '/' . time() . '/';
        File::isDirectory($savePath) or File::makeDirectory($savePath, 0777, true, true);
        $name = $request->file('file')->getClientOriginalName();
        $request->file('file')->move($savePath, $name);
        $path = '/' . $savePath . $name;
        $data = compact('path');
        $this->Success(['data' => $data, 'code' => 20004]);
    }

    public function excel(Request $request)
    {
//        if (!$request->hasFile('file')) {
//            $this->Error(61004);
//        }
//        $file = $request->file("file");
//        if ($file) {
//            $allowType = ['application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'];
//            if (in_array($file->getMimeType(), $allowType) && $file->getSize() < 20971520) {
//                $excelPath = './ModulesExcel/' . date('Ymd') . '/';
//                File::isDirectory($excelPath) or File::makeDirectory($excelPath, 0777, true, true);
//                $fileName = time() . '.' . $file->getClientOriginalExtension();
//                $request->file('file')->move($excelPath, $fileName);
//                Excel::queueImport((new Import)->onlySheets('Sheet1'), $excelPath . $fileName);
//                $data = ['path' => $excelPath . $fileName];
//                $this->Success(['data' => $data, 'code' => 20004]);
//            } else {
//                $this->Error(60025);
//            }
//        } else {
//            $this->Error(60023);
//        }
    }
}
