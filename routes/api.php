<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubmissionController;
use App\Http\Middleware\Authenticate;

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
/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/
// Define API routes for your tables
use App\Http\Controllers\APIFormController;

Route::get('/patients', [APIFormController::class, 'getAllPatients']);
Route::get('/patients/{id}', [APIFormController::class, 'getPatientById']);
Route::get('/relatives', [APIFormController::class, 'getAllRelatives']);
Route::get('/relatives/{id}', [APIFormController::class, 'getRelativeById']);
Route::get('/insurance', [APIFormController::class, 'getAllInsurance']);
Route::get('/insurance/{id}', [APIFormController::class, 'getInsuranceById']);
