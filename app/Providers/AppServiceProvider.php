<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

//Repositories imports
use App\Repositories\UserRepository;
use App\Repositories\EnquiryRepository;
use App\Repositories\StudentTestimonialRepository;
use App\Repositories\RegistrationStudentRepository;
use App\Repositories\AlumniSpeakRepository;
use App\Repositories\PlacedStudentRepository;

//Interfaces imports
use App\Repositories\Interfaces\EnquiryRepositoryInterface;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\StudentTestimonialRepositoryInterface;
use App\Repositories\Interfaces\AlumniSpeakRepositoryInterface;
use App\Repositories\Interfaces\PlacedStudentRepositoryInterface;



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
        $this->app->bind(StudentTestimonialRepositoryInterface::class, StudentTestimonialRepository::class);
        $this->app->bind(AlumniSpeakRepositoryInterface::class, AlumniSpeakRepository::class);
        $this->app->bind(PlacedStudentRepositoryInterface::class, PlacedStudentRepository::class);
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
