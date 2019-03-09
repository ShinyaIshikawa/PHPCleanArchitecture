<?php

namespace Clean\Web\Adapter;
use Clean\Web\Adapter\Repositories\UserRepository;
use Clean\Web\Usecase\AddUserUsecase;
use Clean\Web\Usecase\InputBoudary;
use Clean\Web\Usecase\IUserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes/web.php';
        $this->app->bind(
            IUserRepository::class,
            UserRepository::class
        );
        $this->app->bind(
            InputBoudary::class,
            AddUserUsecase::class
        );
        $this->app->make('Clean\Web\Adapter\Controllers\UserController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
