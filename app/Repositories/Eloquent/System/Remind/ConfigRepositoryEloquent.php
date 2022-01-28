<?php

namespace App\Repositories\Eloquent\System\Remind;

use App\Repositories\Presenters\System\Remind\ConfigPresenter;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\Interfaces\System\Remind\ConfigRepository;
use App\Models\System\Remind\Config;

/**
 * Class ConfigRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent\System\Remind;
 */
class ConfigRepositoryEloquent extends BaseRepository implements ConfigRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Config::class;
    }

    public function presenter()
    {
        return app(ConfigPresenter::class); // TODO: Change the autogenerated stub
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {

    }

}
