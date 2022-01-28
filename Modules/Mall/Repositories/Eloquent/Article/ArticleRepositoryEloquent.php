<?php

namespace Modules\Mall\Repositories\Eloquent\Article;

use Modules\Mall\Entities\Article\Article;
use Modules\Mall\Repositories\Interfaces\Article\ArticleRepository;
use Modules\Mall\Repositories\Presenters\Article\ArticlePresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class VideoRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class ArticleRepositoryEloquent extends BaseRepository implements ArticleRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Article::class;
    }

    public function presenter()
    {
        return app(ArticlePresenter::class);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

    public function remote()
    {

    }

    public function adminList($title, $array, $limit)
    {
        return $this->scopeQuery(function ($query) use ($title, $array) {
            return $query->whereRaw("(concat(name,short_description,keywords) like '%" . $title . "%')")->where($array);
        })->orderBy('status', 'desc')->orderBy('sort', 'desc')->orderBy('id', 'desc')->paginate($limit);
    }

}
