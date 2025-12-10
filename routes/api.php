<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\SupervisorRatingController;
use App\Http\Controllers\VolunteerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('login', [AuthController::class, 'login']);
//Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->group(function () {
    Route::get('volunteer/info', [VolunteerController::class, 'info']);
    Route::post('volunteer/info', [VolunteerController::class, 'updateInfo']);
    Route::get('/evaluations', [EvaluationController::class, 'index']);
    Route::get('/evaluations/{id}', [EvaluationController::class, 'show']);
    Route::post('/complaints', [ComplaintController::class, 'store']);
//    Route::get('/supervisors/search', [SupervisorRatingController::class, 'searchSupervisor']);
    Route::post('/supervisors/{id}/rate', [SupervisorRatingController::class, 'rateSupervisor']);
    });
Route::get('/supervisors', [SupervisorRatingController::class, 'getSupervisorsList']);
