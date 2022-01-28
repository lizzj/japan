<?php

namespace Modules\Mall\Http\Controllers\Admin\Payment;

use App\Repositories\Interfaces\System\Payment\AlipayRepository;
use Illuminate\Support\Facades\File;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Payment\Alipay\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Payment\Alipay\UpdateRequest;

class AlipayController extends AdminController
{
    public function __construct(AlipayRepository $alipay)
    {
        $this->authId();
        $this->alipay = $alipay;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->alipay->all()]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        if ($this->isExist($data['app_id'], $data['mode'], $data['service_provider_id'] ?? null, 0)) {
            $this->Error(60004);
        }
        $data['scene'] = str_replace(['APP支付', 'H5支付'], ['app', 'wap'], $data['scene_lang']);
        if ((int)$data['mode'] === 0) {
            $data['mode_type'] = 'normal';
            $data['service_provider_id'] = null;
        } else {
            $data['mode_type'] = 'service';
        }
        $data['app_secret_cert'] = File::get($data['app_secret_cert_file']);
        $this->apiCreate(['data' => $this->alipay->create($data)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {
            if ($this->isExist($data['app_id'], $data['mode'], $data['service_provider_id'] ?? null, $id)) {
                $this->Error(60004);
            }
            if ((int)$data['mode'] === 0) {
                $data['mode_type'] = 'normal';
                $data['service_provider_id'] = null;
            } else {
                $data['mode_type'] = 'service';
            }
            $data['scene'] = str_replace(['APP支付', 'H5支付'], ['app', 'web'], $data['scene_lang']);
            $data['app_secret_cert'] = File::get($data['app_secret_cert_file']);
        }
        $this->apiUpdate(['data' => $this->alipay->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->alipay->delete($id)]);
    }

    public function isExist($app_id, $mode, $service_id, $id)
    {
        return $this->alipay->isExist($app_id, $mode, $service_id, $id);
    }
}
