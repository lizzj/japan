<?php

namespace Modules\Mall\Http\Controllers\Admin\Goods;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Goods\Category\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Goods\Category\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Goods\CategoryRepository;

class CategoryController extends AdminController
{
    public function __construct(CategoryRepository $category)
    {
        $this->authId();
        $this->category = $category;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->category->orderBy('sort', 'desc')->findByField('pid', 0)]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->category->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $data = $request->validated();
        if ($data['action'] === 'main') {
            $data['icon'] = str_replace(config('mall.url'), '', $data['icon']);
        }
        $this->apiUpdate(['data' => $this->category->update($data, $id)]);

    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->category->delete($id)]);
    }

    public function option()
    {
        $type = request()->type ?? $this->Error(60021);
        $pid = request()->pid ?? $this->Error(60021);
        $this->apiOption(['data' => $this->category->option($type, $pid)]);
    }
}
