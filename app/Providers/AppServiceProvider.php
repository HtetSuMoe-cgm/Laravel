<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Contracts\Services\PostServiceInterface', 'App\Services\Post\PostService');
        $this->app->bind('App\Contracts\Dao\PostDaoInterface', 'App\Dao\Post\PostDao');

        $this->app->bind('App\Contracts\Services\UserServiceInterface', 'App\Services\User\UserService');
        $this->app->bind('App\Contracts\Dao\UserDaoInterface', 'App\Dao\User\UserDao');
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
