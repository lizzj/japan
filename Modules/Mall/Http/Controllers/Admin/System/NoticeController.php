<?php

namespace Modules\Mall\Http\Controllers\Admin\System;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\System\Notice\CreateRequest;
use Modules\Mall\Http\Requests\Admin\System\Notice\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\System\NoticeRepository;

class NoticeController extends AdminController
{
    public function __construct(NoticeRepository $notice)
    {
        $this->authId();
        $this->notice = $notice;
    }

    public function index()
    {
        $title = request()->title;
        $limit = request()->limit ?? 20;
        $this->apiDefault(['data' => $this->notice->adminList($title, $limit)]);

    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        if ($data['link'] === 'no') {
            $data['link_id'] = null;
            $data['link_type'] = null;
        }
        $this->apiCreate(['data' => $this->notice->create($data)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main' && $data['link'] === 'no') {
            $data['link_id'] = null;
            $data['link_type'] = null;
        }
        $this->apiUpdate(['data' => $this->notice->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->notice->delete($id)]);
    }
}
