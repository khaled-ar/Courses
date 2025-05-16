<?php

use App\Http\Controllers\CoursesController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->prefix('courses')->controller(CoursesController::class)->group(function() {
    Route::get('', 'index');
    Route::post('enroll/{course}', 'enroll');
    Route::get('my-courses', 'enrolled');
});
