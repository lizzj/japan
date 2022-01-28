<?php

namespace App\Repositories\Eloquent\System\Remind;

use App\Repositories\Presenters\System\Remind\AliyunPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\System\Remind\AliyunRepository;
use App\Models\System\Remind\Aliyun;

/**
 * Class AliyunRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent\System\Remind;
 */
class AliyunRepositoryEloquent extends BaseRepository implements AliyunRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Aliyun::class;
    }

    public function presenter()
    {
        return app(AliyunPresenter::class); // TODO: Change the autogenerated stub
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

    public function verifyStatus()
    {
        return Aliyun::find(1)->status === 'off';
    }
}