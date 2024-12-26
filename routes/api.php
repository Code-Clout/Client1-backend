<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationStudentController;
use App\Http\Controllers\StudentTestimonialController;
use App\Http\Controllers\AlumniSpeakController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\PlacedStudentController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\GalleryPhotoController;



// Public Routes
Route::post('/student-enquiries', [EnquiryController::class, 'createEnquiry']);
Route::get('/get-all-enquiries', [EnquiryController::class, 'getAllEnquiries']);
Route::post('/admin/login', [UserController::class, 'login']);
Route::get('/getAll-student-testimonials', [StudentTestimonialController::class, 'index']); 
Route::get('/getAll-alumni-speaks', [AlumniSpeakController::class, 'index']);
Route::get('/get-placed-students', [PlacedStudentController::class, 'index']);
Route::get('/get-announcements', [AnnouncementController::class, 'index']);
Route::get('/get-gallery-photos', [GalleryPhotoController::class, 'getAllPhotos']);

//registration student routes
Route::post('/student-register', [RegistrationStudentController::class, 'create']);
Route::get('/getAll-register-students', [RegistrationStudentController::class, 'index']);
Route::delete('/delete-register-student/{id}', [RegistrationStudentController::class, 'softDelete']);
Route::post('/verify-student/{id}', [RegistrationStudentController::class, 'verifyStudent']);


Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    
    //admin Apis
    Route::get('/get-all-admin', [UserController::class, 'getAllUsers']);
    Route::post('/create', [UserController::class, 'createUser']);
    Route::get('/get-admin/{id}', [UserController::class, 'getUser']);
    Route::put('/update-admin/{id}', [UserController::class, 'updateUser']);
    Route::delete('/delete-admin/{id}', [UserController::class, 'deleteUser']);

    // student-testimonials
    Route::get('/get-student-testimonials/{id}', [StudentTestimonialController::class, 'show']); 
    Route::post('/create-student-testimonials', [StudentTestimonialController::class, 'store']);
    Route::put('/update-student-testimonials/{id}', [StudentTestimonialController::class, 'update']); 
    Route::delete('/delete-student-testimonials/{id}', [StudentTestimonialController::class, 'destroy']);

    // AlumniSpeak
    Route::get('/get-alumni-speaks/{id}', [AlumniSpeakController::class, 'show']);
    Route::post('/create-alumni-speaks', [AlumniSpeakController::class, 'store']);
    Route::put('/update-alumni-speaks/{id}', [AlumniSpeakController::class, 'update']);
    Route::delete('/delete-alumni-speaks/{id}', [AlumniSpeakController::class, 'destroy']);
   
    // PlacedStudent
    Route::get('/get-placed-students/{id}', [PlacedStudentController::class, 'show']);
    Route::post('/create-placed-students', [PlacedStudentController::class, 'store']);
    Route::put('/update-placed-students/{id}', [PlacedStudentController::class, 'update']);
    Route::delete('/delete-placed-students/{id}', [PlacedStudentController::class, 'destroy']);

    // Announcement
    Route::get('/get-announcements/{id}', [AnnouncementController::class, 'show']);
    Route::post('/create-announcements', [AnnouncementController::class, 'store']);
    Route::put('/update-announcements/{id}', [AnnouncementController::class, 'update']);
    Route::delete('/delete-announcements/{id}', [AnnouncementController::class, 'destroy']);

    Route::get('/getAll-questions', [QuestionController::class, 'index']);
    Route::get('/get-question/{id}', [QuestionController::class, 'show']);
    Route::post('/create-questions', [QuestionController::class, 'store']);
    Route::put('/update-questions/{id}', [QuestionController::class, 'update']);
    Route::delete('/delete-questions/{id}', [QuestionController::class, 'destroy']);

    Route::post('/create-gallery-photo', [GalleryPhotoController::class, 'createPhoto']);
    Route::delete('/delete-gallery-photo/{id}', [GalleryPhotoController::class, 'deletePhoto']);
    
});



