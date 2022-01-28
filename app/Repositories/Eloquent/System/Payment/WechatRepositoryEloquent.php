<?php

namespace App\Repositories\Eloquent\System\Payment;

use App\Repositories\Presenters\System\Payment\WechatPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\System\Payment\WechatRepository;
use App\Models\System\Payment\Wechat;

/**
 * Class WechatRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent\System\Payment;
 */
class WechatRepositoryEloquent extends BaseRepository implements WechatRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Wechat::class;
    }
    public function presenter()
    {
        return app(WechatPresenter::class); // TODO: Change the autogenerated stub
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {


    }
 public function randomAccount()
    {
        $array = $this->scopeQuery(function ($query) {
            return $query->where(['status' => 'on']);
        })->orderByRaw("RAND()")->take(1)->pluck('id')->toArray();
        if (count($array) === 0) {
            return false;
        }
        return $array[0];
    }
}