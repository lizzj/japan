<?php

namespace Modules\Mall\Repositories\Eloquent\Article;

use Modules\Mall\Entities\Article\Category;
use Modules\Mall\Repositories\Interfaces\Article\CategoryRepository;
use Modules\Mall\Repositories\Presenters\Article\CategoryPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class VideoRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
 */
class CategoryRepositoryEloquent extends BaseRepository implements CategoryRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    public function presenter()
    {
        return app(CategoryPresenter::class);
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

    public function option()
    {
        return Category::where(['status' => 'on'])->pluck('name', 'id');
    }
}
