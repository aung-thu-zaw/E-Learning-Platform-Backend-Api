<?php

use App\Http\Controllers\Api\V1\User\GetUserReferralCodeController;
use App\Http\Controllers\Api\V1\User\GetUserSavedCourseController;
use App\Http\Controllers\Api\V1\User\GetUserSavedLearningPathController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])
    ->prefix('user')
    ->group(function () {

        // ========== Saved Lists ==========
        Route::get('/courses/saved', GetUserSavedCourseController::class);
        Route::get('/learning-paths/saved', GetUserSavedLearningPathController::class);

        // ========== Referral Code ==========
        Route::get('/referral-code', GetUserReferralCodeController::class);
    });
