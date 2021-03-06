<?php

namespace App\Repositories\Eloquent\System\Remind;

use App\Repositories\Presenters\System\Remind\TencentPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\System\Remind\TencentRepository;
use App\Models\System\Remind\Tencent;

/**
 * Class TencentRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent\System\Remind;
 */
class TencentRepositoryEloquent extends BaseRepository implements TencentRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Tencent::class;
    }

    public function presenter()
    {
        return app(TencentPresenter::class); // TODO: Change the autogenerated stub
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }
public function verifyStatus()
    {
        return Tencent::find(1)->status === 'off';
    }
}
