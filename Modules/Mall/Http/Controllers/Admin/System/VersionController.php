<?php

namespace Modules\Mall\Http\Controllers\Admin\System;

use Illuminate\Support\Facades\File;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\System\Version\CreateRequest;
use Modules\Mall\Http\Requests\Admin\System\Version\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\System\VersionRepository;

class VersionController extends AdminController
{
    private VersionRepository $version;

    public function __construct(VersionRepository $version)
    {
        $this->authId();
        $this->version = $version;
    }

    public function index()
    {
        $limit = \request()->limit ?? 20;
        $this->apiDefault(['data' => $this->version->orderBy('id', 'desc')->paginate($limit)]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->version->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'status') {
            if ($this->verifyLast($id)) {
                $this->changeFile($id);
            } else {
                $this->Error(62001);
            }
        } elseif ($data['action'] === 'force') {
            //将删除以前的apk文件
            $array = $this->version->where('id', '<', $id)->pluck('id');
            for ($i = 0, $iMax = count($array); $i < $iMax; $i++) {
                if ($this->changeFile($array[$i])) {
                    $this->version->delete($array[$i]);
                }
            }
        }
        $this->apiUpdate(['data' => $this->version->update($data, $id)]);
    }

    public function destroy($id)
    {
        //已发布的最新版本禁止删除
        if ($this->verifyLast($id)) {
            if ($this->changeFile($id)) {
                $this->apiDestroy(['data' => $this->version->delete($id)]);
            }
        } else {
            $this->Error(62001);
        }
    }

    public function verifyLast($id)
    {
        $baseInfo = $this->version->find($id)['data'];
        $max_id = $this->version->maxId($baseInfo['platform']);
        if ($max_id === (int)$id) {
            return false;
        }
        return true;
    }

    public function changeFile($id)
    {
        $baseInfo = $this->version->find($id)['data'];
        $file = '.' . str_replace(config('mall.url'), '', $baseInfo['url']);
        File::chmod($file, 0311);
        return true;
    }
}
