<?php

use Illuminate\Http\Request;

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

Route::apiResource('courses', 'CourseController');
Route::get('students/search', 'StudentSearchController@index');
Route::get('students/stats', 'StudentStatsController@index');
Route::apiResource('students', 'StudentController');
Route::apiResource('enrollments', 'EnrollmentController');
