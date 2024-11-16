<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegistrationStudentController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Register API routes for your application here.
|
*/

// Authenticated user info
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Public Routes
Route::post('/student-enquiries', [EnquiryController::class, 'createEnquiry']);
Route::get('/get-all-enquiries', [EnquiryController::class, 'getAllEnquiries']);
Route::post('/admin/login', [UserController::class, 'login']);

Route::prefix('students')->group(function () {
    Route::post('/create', [RegistrationStudentController::class, 'create']);
    Route::get('/', [RegistrationStudentController::class, 'index']);
    Route::delete('/{id}', [RegistrationStudentController::class, 'softDelete']);
});

Route::prefix('admin')->middleware('auth:sanctum')->group(function () {
    Route::get('/get-all-admin', [UserController::class, 'getAllUsers']);
    Route::post('/create', [UserController::class, 'createUser']);
    Route::get('/get-admin/{id}', [UserController::class, 'getUser']);
    Route::put('/update-admin/{id}', [UserController::class, 'updateUser']);
    Route::delete('/delete-admin/{id}', [UserController::class, 'deleteUser']);
});
