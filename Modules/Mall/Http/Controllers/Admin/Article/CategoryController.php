<?php

namespace Modules\Mall\Http\Controllers\Admin\Article;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Article\Category\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Article\Category\UpdateRequest;
use Modules\Mall\Repositories\Interfaces\Article\CategoryRepository;

class CategoryController extends AdminController
{
    public function __construct(CategoryRepository $category)
    {
        $this->authId();
        $this->category = $category;
    }

    public function index()
    {
        $this->apiDefault(['data' => $this->category->all()]);
    }

    public function store(CreateRequest $request)
    {
        $this->apiCreate(['data' => $this->category->create($request->validated())]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $this->apiUpdate(['data' => $this->category->update($request->validated(), $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->category->delete($id)]);
    }

    public function option()
    {
        $this->apiOption(['data' => $this->category->option()]);
    }
}
