<?php

use Illuminate\Support\Facades\Route;


Route::midlleware('auth:sanctum')->prefix('courses')->controller(CoursesController::class)->group(function() {
    Route::get('', 'index');
    Route::post('enroll/{course}', 'enroll');
    Route::get('enrolled', 'enrolled');
});