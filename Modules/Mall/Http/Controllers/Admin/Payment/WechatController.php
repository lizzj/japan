<?php

namespace Modules\Mall\Http\Controllers\Admin\Payment;

use App\Repositories\Interfaces\System\Payment\WechatRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Payment\Wechat\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Payment\Wechat\UpdateRequest;

class WechatController extends AdminController
{
    public function __construct(WechatRepository $wechat)
    {
        $this->authId();
        $this->wechat = $wechat;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->wechat->all()]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        $data['scene'] = str_replace(['APP支付', 'H5支付', '小程序支付'], ['app', 'wap', 'mini'], $data['scene_lang']);
        if ((int)$data['mode'] === 2) {
            if (in_array('mini', $data['scene'], true)) {
                $data['sub_mini_app_id'] === '' ?? $this->Error(60021);
            }
            if (in_array('app', $data['scene'], true)) {
                $data['sub_app_id'] === '' ?? $this->Error(60021);
            }
            if (in_array('wap', $data['scene'], true)) {
                $data['sub_mp_app_id'] === '' ?? $this->Error(60021);
            }
        }
        if ((int)$data['mode'] === 0) {
            $data['mode_type'] = 'normal';
            $data['sub_mch_id'] = null;
        } else {
            $data['mode_type'] = 'service';
        }
        $data['mch_secret_cert'] = File::get($data['mch_secret_cert_file']);
        $this->apiCreate(['data' => $this->wechat->create($data)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {

        } elseif ($data['action'] === 'status') {
            $data = Arr::only($data, ['status']);
        }
        $this->apiUpdate(['data' => $this->wechat->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->wechat->delete($id)]);
    }

    public function isExist($app_id, $mode, $service_id, $id)
    {
        return $this->wechat->isExist($app_id, $mode, $service_id, $id);
    }

//    public function verifyApp($data)
//    {
//        if (in_array('app', $data['scene'], true) && $data['sub_app_id'] !== '') {
//            return false;
//        }
//        return true;
//    }
//
//    public function verifyMini($data)
//    {
//        if (in_array('mini', $data['scene'], true) && $data['sub_mini_app_id'] !== '') {
//            return false;
//        }
//        return true;
//    }
//
//    public function verifyWap($data)
//    {
//        if (in_array('wap', $data['scene'], true) && $data['sub_mp_app_id'] !== '') {
//            return false;
//        }
//        return true;
//    }
}
