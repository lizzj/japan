<?php

namespace Modules\Mall\Repositories\Eloquent\Goods;

use Modules\Mall\Entities\Goods\Category;
use Modules\Mall\Repositories\Interfaces\Goods\CategoryRepository;
use Modules\Mall\Repositories\Presenters\Goods\CategoryPresenter;
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

    public function option($type, $pid)
    {
        if ($type === 'self') {
            return Category::where(['status' => 'on', 'pid' => $pid])->pluck('name', 'id');
        }
    }
}
