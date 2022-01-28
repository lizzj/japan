<?php

namespace Modules\Mall\Http\Controllers\Admin\Member\Withdrawal;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Type\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Member\Withdrawal\Type\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Member\Withdrawal\TypeRepository;

class TypeController extends AdminController
{
    public function __construct(TypeRepository $type)
    {
        $this->authId();
        $this->type = $type;
    }

    public function index()
    {
        $title = \request()->title;
        $limit = \request()->limit ?? 20;
        $this->apiDefault(['data' => $this->type->adminList($title, $limit)]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->type->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {
            $data['icon'] = str_replace(config('mall.icon'), '', $data['icon']);
        }
        $this->apiUpdate(['data' => $this->type->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->type->delete($id)]);
    }

    public function option()
    {
        $this->apiOption(['data' => $this->type->option()]);
    }
}
