<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [AuthenticationController::class, 'register']);

Route::post('/login', [AuthenticationController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::get('profile', function (Request $request) {
        return auth()->user();
    });

    Route::apiResource('exercises', ExerciseController::class)->except('index', 'show');
    Route::apiResource('students', StudentController::class)->except('index', 'show');
});

Route::apiResource('exercises', ExerciseController::class)->only('index', 'show');
Route::apiResource('students', StudentController::class)->only('index', 'show');


