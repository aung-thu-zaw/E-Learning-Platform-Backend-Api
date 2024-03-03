<?php

use App\Http\Controllers\Api\V1\Instructor\Courses\CourseController;
use App\Http\Controllers\Api\V1\Instructor\Courses\GetResourcesForCourseActionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified', 'user.role:instructor'])
    ->prefix('instructor')
    ->group(function () {

        // ========== Course ==========
        Route::apiResource('courses', CourseController::class);
        Route::get('/course-resources', GetResourcesForCourseActionController::class);
    });
