<?php

namespace Modules\Mall\Http\Controllers\Admin\Article;

use Modules\Mall\Http\Controllers\Admin\AdminController;
use Modules\Mall\Http\Requests\Admin\Article\Article\CreateRequest;
use Modules\Mall\Http\Requests\Admin\Article\Article\UpdateRequest;
use Modules\Mall\Jobs\Article\Category\Count;
use Modules\Mall\Repositories\Interfaces\Article\ArticleRepository;

class ArticleController extends AdminController
{
    public function __construct(ArticleRepository $article)
    {
        $this->article = $article;
        $this->authId();
    }

    public function index()
    {
        $title = request()->title;
        $limit = request()->limit ?? 20;
        $category_id = request()->category;
        $array = ArrayDetail(compact('category_id'));
        $this->apiDefault(['data' => $this->article->adminList($title, $array, $limit)]);
    }

    public function store(CreateRequest $request)
    {
        $data = $request->validated();
        Count::dispatch($data['category_id'], 1);
        $this->apiCreate(['data' => $this->article->create($data)]);
    }

    public function show($id)
    {
        try {
            $this->article->find($id);
        } catch (\Exception $e) {
            $this->Error(60002);
        }
        $this->apiDefault(['data' => $this->article->find($id)]);
    }

    public function update(UpdateRequest $request, $id)
    {
        $oldInfo = $this->article->find($id)['data'];
        $data = $request->validated();

        if ($data['action'] === 'main') {
            if ($data['image'] === 'null') {
                $data['image'] = null;
            }
            $data['image'] = str_replace(config('mall.url'), '', $data['image']);
            Count::dispatch($oldInfo['category_id'], -1);
            Count::dispatch($data['category_id'], 1);
        }

        $this->apiUpdate(['data' => $this->article->update($data, $id)]);
    }

    public function destroy($id)
    {
        $this->apiDestroy(['data' => $this->article->delete($id)]);
    }

    public function remote()
    {
        $article = request()->article ?? $this->Error(60021);
        $this->apiOption(['data' => $this->article->remote($article)]);
    }
}
