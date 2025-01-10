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
use App\Repositories\AnnouncementRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\GalleryPhotoRepository;
use App\Repositories\PackageRepository;
use App\Repositories\RecognitionAndApprovalRepository;
use App\Repositories\FeesPaymentStructureRepository;
use App\Repositories\MetadataRepository;
use App\Repositories\TaskRepository;

//Interfaces imports
use App\Repositories\Interfaces\EnquiryRepositoryInterface;
use App\Repositories\Interfaces\RegistrationStudentRepositoryInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Repositories\Interfaces\StudentTestimonialRepositoryInterface;
use App\Repositories\Interfaces\AlumniSpeakRepositoryInterface;
use App\Repositories\Interfaces\PlacedStudentRepositoryInterface;
use App\Repositories\Interfaces\AnnouncementRepositoryInterface;
use App\Repositories\Interfaces\QuestionRepositoryInterface;
use App\Repositories\Interfaces\GalleryPhotoRepositoryInterface;
use App\Repositories\Interfaces\PackageRepositoryInterface;
use App\Repositories\Interfaces\RecognitionAndApprovalRepositoryInterface;
use App\Repositories\Interfaces\FeesPaymentStructureRepositoryInterface;
use App\Repositories\Interfaces\MetadataRepositoryInterface;
use App\Repositories\Interfaces\TaskRepositoryInterface;


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
        $this->app->bind(AnnouncementRepositoryInterface::class, AnnouncementRepository::class);
        $this->app->bind(QuestionRepositoryInterface::class, QuestionRepository::class);
        $this->app->bind(GalleryPhotoRepositoryInterface::class, GalleryPhotoRepository::class);
        $this->app->bind(PackageRepositoryInterface::class, PackageRepository::class);
        $this->app->bind(RecognitionAndApprovalRepositoryInterface::class, RecognitionAndApprovalRepository::class);
        $this->app->bind(FeesPaymentStructureRepositoryInterface::class, FeesPaymentStructureRepository::class);
        $this->app->bind(MetadataRepositoryInterface::class, MetadataRepository::class);
        $this->app->bind(TaskRepositoryInterface::class, TaskRepository::class);
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
