<?php

namespace Modules\Mall\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //:start-bindings:
        /**
         * Article
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Article\CategoryRepository::class, \Modules\Mall\Repositories\Eloquent\Article\CategoryRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Article\ArticleRepository::class, \Modules\Mall\Repositories\Eloquent\Article\ArticleRepositoryEloquent::class);
        /**
         * Goods
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Goods\CategoryRepository::class, \Modules\Mall\Repositories\Eloquent\Goods\CategoryRepositoryEloquent::class);
        /**
         * System
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\System\ConfigRepository::class, \Modules\Mall\Repositories\Eloquent\System\ConfigRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\System\VersionRepository::class, \Modules\Mall\Repositories\Eloquent\System\VersionRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\System\OnlineRepository::class, \Modules\Mall\Repositories\Eloquent\System\OnlineRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\System\SwipeRepository::class, \Modules\Mall\Repositories\Eloquent\System\SwipeRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\System\NoticeRepository::class, \Modules\Mall\Repositories\Eloquent\System\NoticeRepositoryEloquent::class);
        /*
         * Member--Base
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Base\AddressRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Base\AddressRepositoryEloquent::class);
        /**
         * Member-Withdrawal
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Withdrawal\ConfigRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Withdrawal\ConfigRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Withdrawal\LogRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Withdrawal\LogRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Withdrawal\TypeRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Withdrawal\TypeRepositoryEloquent::class);
        /**
         * Member-Asset
         */
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Asset\BalanceRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Asset\BalanceRepositoryEloquent::class);
        $this->app->bind(\Modules\Mall\Repositories\Interfaces\Member\Asset\CommissionRepository::class, \Modules\Mall\Repositories\Eloquent\Member\Asset\CommissionRepositoryEloquent::class);
        //:end-bindings:
    }
}
