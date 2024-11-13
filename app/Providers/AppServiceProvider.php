<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\EnquiryRepositoryInterface;
use App\Repositories\EnquiryRepository;
use App\Repositories\RegistrationStudentRepository;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use App\Repositories\UserRepository;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EnquiryRepositoryInterface::class, EnquiryRepository::class);
        $this->app->bind(RegistrationStudentRepositoryInterface::class, RegistrationStudentRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
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
