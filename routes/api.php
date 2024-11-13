<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EnquiryController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/student-enquiries', [EnquiryController::class, 'createEnquiry']);
Route::get('/get-all-enquiries', [EnquiryController::class, 'getAllEnquiries']);


Route::prefix('students')->group(function () {
    Route::post('/create', [RegistrationStudentController::class, 'create']);
    Route::get('/', [RegistrationStudentController::class, 'index']);
    Route::delete('/{id}', [RegistrationStudentController::class, 'softDelete']);
});