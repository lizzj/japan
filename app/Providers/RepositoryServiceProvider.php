<?php

namespace App\Providers;

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
        /*
         * Start
         */
        /**
         * Auth-Mall-Admin
         */
        $this->app->bind(\App\Repositories\Interfaces\Auth\Mall\Admin\AdminRepository::class, \App\Repositories\Eloquent\Auth\Mall\Admin\AdminRepositoryEloquent::class);             //商城模块--后台-Admin
        $this->app->bind(\App\Repositories\Interfaces\Auth\Mall\Admin\RolesRepository::class, \App\Repositories\Eloquent\Auth\Mall\Admin\RolesRepositoryEloquent::class);             //商城模块--后台-AdminRoles
        /**
         *
         */
        $this->app->bind(\App\Repositories\Interfaces\Auth\User\UserRepository::class, \App\Repositories\Eloquent\Auth\User\UserRepositoryEloquent::class);             //用户模块 ClientUser
        $this->app->bind(\App\Repositories\Interfaces\Auth\User\LevelRepository::class, \App\Repositories\Eloquent\Auth\User\LevelRepositoryEloquent::class);             //用户模块 ClientLevel
        /**
         * System-Payment
         */
        $this->app->bind(\App\Repositories\Interfaces\System\Payment\AlipayRepository::class, \App\Repositories\Eloquent\System\Payment\AlipayRepositoryEloquent::class);             //用户模块 ClientLevel
        $this->app->bind(\App\Repositories\Interfaces\System\Payment\LogRepository::class, \App\Repositories\Eloquent\System\Payment\LogRepositoryEloquent::class);             //用户模块 ClientLevel
        $this->app->bind(\App\Repositories\Interfaces\System\Payment\WechatRepository::class, \App\Repositories\Eloquent\System\Payment\WechatRepositoryEloquent::class);             //用户模块 ClientLevel
        /**
         * System-Sms
         */
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\AliyunRepository::class, \App\Repositories\Eloquent\System\Sms\AliyunRepositoryEloquent::class);     //短信配置
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\ConfigRepository::class, \App\Repositories\Eloquent\System\Sms\ConfigRepositoryEloquent::class);     //短信配置
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\LogRepository::class, \App\Repositories\Eloquent\System\Sms\LogRepositoryEloquent::class);     //短信配置
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\RosterRepository::class, \App\Repositories\Eloquent\System\Sms\RosterRepositoryEloquent::class);     //短信配置
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\TemplateRepository::class, \App\Repositories\Eloquent\System\Sms\TemplateRepositoryEloquent::class);     //短信配置
        $this->app->bind(\App\Repositories\Interfaces\System\Sms\TencentRepository::class, \App\Repositories\Eloquent\System\Sms\TencentRepositoryEloquent::class);     //短信配置
        /**
         * System-Remind
         */
        $this->app->bind(\App\Repositories\Interfaces\System\Remind\TencentRepository::class, \App\Repositories\Eloquent\System\Remind\TencentRepositoryEloquent::class);     //通知模块 微信通知
        $this->app->bind(\App\Repositories\Interfaces\System\Remind\ConfigRepository::class, \App\Repositories\Eloquent\System\Remind\ConfigRepositoryEloquent::class);     //通知模块 微信通知
        $this->app->bind(\App\Repositories\Interfaces\System\Remind\AliyunRepository::class, \App\Repositories\Eloquent\System\Remind\AliyunRepositoryEloquent::class);     //通知模块 微信通知
        $this->app->bind(\App\Repositories\Interfaces\System\Remind\LogRepository::class, \App\Repositories\Eloquent\System\Remind\LogRepositoryEloquent::class);     //通知模块 微信通知

        /**
         * End
         */
    }
}
