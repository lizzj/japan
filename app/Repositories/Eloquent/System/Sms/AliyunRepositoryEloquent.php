<?php

namespace App\Repositories\Eloquent\System\Sms;

use App\Repositories\Presenters\System\Sms\AliyunPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\System\Sms\AliyunRepository;
use App\Models\System\Sms\Aliyun;

/**
 * Class AliyunRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent\System\Sms;
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

}
