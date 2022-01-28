<?php

namespace Modules\Mall\Repositories\Eloquent\System;

use Modules\Mall\Entities\System\Config;
use Modules\Mall\Repositories\Interfaces\System\ConfigRepository;
use Modules\Mall\Repositories\Presenters\System\ConfigPresenter;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class VideoRepositoryEloquent.
 *
 * @package namespace App\Repositories\Eloquent;
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
