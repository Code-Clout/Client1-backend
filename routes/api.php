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
use App\Http\Controllers\PackageController;
use App\Http\Controllers\RecognitionAndApprovalController;
use App\Http\Controllers\FeesPaymentStructureController;
use App\Http\Controllers\MetadataController;
use App\Http\Controllers\TaskController;



// Public Routes
Route::post('/student-enquiries', [EnquiryController::class, 'createEnquiry']);
Route::get('/get-all-enquiries', [EnquiryController::class, 'getAllEnquiries']);
Route::post('/admin/login', [UserController::class, 'login']);
Route::get('/getAll-student-testimonials', [StudentTestimonialController::class, 'index']); 
Route::get('/getAll-alumni-speaks', [AlumniSpeakController::class, 'index']);
Route::get('/get-placed-students', [PlacedStudentController::class, 'index']);
Route::get('/get-announcements', [AnnouncementController::class, 'index']);
Route::get('/get-gallery-photos', [GalleryPhotoController::class, 'getAllPhotos']);
Route::get('/getAll-recognition-and-approvals', [RecognitionAndApprovalController::class, 'index']);
Route::get('/fees', [FeesPaymentStructureController::class, 'index']);
Route::get('/getAll-packages', [PackageController::class, 'getAllPackages']);
Route::get('/getAll-images', [MetadataController::class, 'getAll']);

//registration student routes
Route::post('/student-register', [RegistrationStudentController::class, 'create']);
Route::get('/getAll-register-students', [RegistrationStudentController::class, 'index']);
Route::delete('/delete-register-student/{id}', [RegistrationStudentController::class, 'softDelete']);
Route::post('/verify-student/{id}', [RegistrationStudentController::class, 'verifyStudent']);

Route::get('/image-types', [MetadataController::class, 'getImageType']);

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    
    //admin Apis
    Route::get('/get-all-admin', [UserController::class, 'getAllUsers']);
    Route::post('/create', [UserController::class, 'createUser']);
    Route::get('/get-admin/{id}', [UserController::class, 'getUser']);
    Route::post('/update-admin/{id}', [UserController::class, 'updateUser']);
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

    // Test Question APis
    Route::get('/getAll-questions', [QuestionController::class, 'index']);
    Route::get('/get-question/{id}', [QuestionController::class, 'show']);
    Route::post('/create-questions', [QuestionController::class, 'store']);
    Route::put('/update-questions/{id}', [QuestionController::class, 'update']);
    Route::delete('/delete-questions/{id}', [QuestionController::class, 'destroy']);

    // gallary photo apis
    Route::post('/create-gallery-photo', [GalleryPhotoController::class, 'createPhoto']);
    Route::delete('/delete-gallery-photo/{id}', [GalleryPhotoController::class, 'deletePhoto']);

    //dashboard api
    Route::get('/dashboard-summary', [UserController::class, 'getDashboardSummary']);
    
    // Package
    Route::post('/create-package', [PackageController::class, 'update']);
    
    //recognition-and-approvals
    Route::get('/get-recognition-and-approvals/{id}', [RecognitionAndApprovalController::class, 'show']);
    Route::post('/create-recognition-and-approvals', [RecognitionAndApprovalController::class, 'store']);
    Route::post('/update-recognition-and-approvals/{id}', [RecognitionAndApprovalController::class, 'update']);
    Route::delete('/delete-recognition-and-approvals/{id}', [RecognitionAndApprovalController::class, 'destroy']);

    //fees
    Route::post('/create-fees/{id}', [FeesPaymentStructureController::class, 'update']);

    //metadata
    Route::post('/create-image', [MetadataController::class, 'create']);
    Route::delete('/delete-image/{id}', [MetadataController::class, 'delete']);

    Route::post('student-enquiries/remark/{id}', [EnquiryController::class, 'addRemark']);

    //Task routes
    Route::post('/tasks', [TaskController::class, 'assignTask']); 
    Route::patch('/tasks/{taskId}/status', [TaskController::class, 'updateTaskStatus']); 
    Route::get('/counsellors/{userId}/tasks', [TaskController::class, 'getTasksForCounsellor']); 
    Route::get('/tasks/summary', [TaskController::class, 'getTaskSummary']); 
    Route::get('/counsellors/{userId}/tasks/count', [TaskController::class, 'getTaskCountForCounsellor']);
    Route::get('/students-with-score', [RegistrationStudentController::class, 'getStudentsWithScore']);

});

Route::get('/questions/random', [QuestionController::class, 'fetchRandom']);
Route::post('/submit-score', [QuestionController::class, 'submitScore']);
Route::get('/student-score/{id}', [QuestionController::class, 'getScore']);
Route::post('/verify-student', [QuestionController::class, 'verifyStudent']);

Route::get('/get-counsellors',[UserController::class,'getAllCounsullors']);


Route::patch('/updateEnroll-students/{id}', [RegistrationStudentController::class, 'enrollStudent']);
Route::get('/students/enrolled', [RegistrationStudentController::class, 'getAllEnrolledStudents']);