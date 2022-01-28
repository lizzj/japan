<?php

namespace Modules\Mall\Http\Controllers\Admin\System;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\System\Swipe\CreateRequest;
use Modules\Mall\Http\Requests\Admin\System\Swipe\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\System\SwipeRepository;

class SwipeController extends AdminController
{
    private SwipeRepository $swipe;

    public function __construct(SwipeRepository $swipe)
    {
        $this->authId();
        $this->swipe = $swipe;
    }

    public function index()
    {
        $title = \request()->title;
        $location = \request()->location;
        $array = ArrayDetail(compact('location'));
        $limit = \request()->limit ?? 20;
        $this->apiDefault(['data' => $this->swipe->adminList($title, $array, $limit)]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        if ($data['link'] === 'no') {
            $data['link_id'] = null;
            $data['link_type'] = null;
        }
        $this->apiCreate(['data' => $this->swipe->create($data)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {
            $data['image'] = str_replace(config('mall.url'), '', $data['image']);
            if ($data['link'] === 'no') {
                $data['link_type'] = null;
                $data['link_id'] = null;
            }
        }
        $this->apiUpdate(['data' => $this->swipe->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->swipe->delete($id)]);
    }
}
