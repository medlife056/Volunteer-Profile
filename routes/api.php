<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\Admin\EvaluationController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\JobTitleController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('admin')->group(function () {

    // Volunteers
    Route::apiResource('volunteers', VolunteerController::class);

    // Evaluations (CRUD)
    Route::get('evaluations', [EvaluationController::class, 'index']);
    Route::post('evaluations', [EvaluationController::class, 'store']);
    Route::get('evaluations/{id}', [EvaluationController::class, 'show']);
    Route::put('evaluations/{id}', [EvaluationController::class, 'update']);
    Route::delete('evaluations/{id}', [EvaluationController::class, 'destroy']);

    // Supervisor Evaluation
    Route::get('supervisors-evaluation', [EvaluationController::class, 'supervisors']);

    // Complaints
    Route::get('complaints', [ComplaintController::class, 'index']);
    Route::get('complaints/{id}', [ComplaintController::class, 'show']);
    Route::put('complaints/{id}', [ComplaintController::class, 'update']);


    // Job Titles 
    Route::get('job-titles', [JobTitleController::class, 'index']);
    Route::post('job-titles', [JobTitleController::class, 'store']);
    Route::get('job-titles/{jobTitle}', [JobTitleController::class, 'show']);
    Route::put('job-titles/{jobTitle}', [JobTitleController::class, 'update']);
    Route::delete('job-titles/{jobTitle}', [JobTitleController::class, 'destroy']);

});







Route::get('/test-relations', function () {
    return \App\Models\VolunteerTask::with(['volunteer', 'supervisor'])->limit(5)->get();
});



Route::get('/test-db', function () {
    return DB::table('volunteertasks')->limit(5)->get();
});



Route::get('/test-all', function () {

    return [
        'volunteers' => \App\Models\Volunteer::count(),
        'evaluations' => \App\Models\Evaluation::count(),
        'complaints' => \App\Models\Complaint::count(),
        'tasks' => \App\Models\VolunteerTask::count(),
    ];
});
