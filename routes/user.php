<?php

use App\Http\Controllers\Api\V1\User\ChangeEmailAddressController;
use App\Http\Controllers\Api\V1\User\ChangePasswordController;
use App\Http\Controllers\Api\V1\User\CourseCompletionController;
use App\Http\Controllers\Api\V1\User\GetEmailNotificationController;
use App\Http\Controllers\Api\V1\User\GetEnrolledCourseController;
use App\Http\Controllers\Api\V1\User\GetResourcesForReminderController;
use App\Http\Controllers\Api\V1\User\GetUserReferralCodeController;
use App\Http\Controllers\Api\V1\User\GetUserSavedCourseController;
use App\Http\Controllers\Api\V1\User\GetUserSavedLearningPathController;
use App\Http\Controllers\Api\V1\User\ReminderController;
use App\Http\Controllers\Api\V1\User\RemovedFromEnrollmentCourseController;
use App\Http\Controllers\Api\V1\User\SyncReminderToGoogleCalendarController;
use App\Http\Controllers\Api\V1\User\UpdateProfileController;
use App\Http\Controllers\Api\V1\User\UpdateProfileInformationController;
use App\Http\Controllers\Api\V1\User\UpdateTwoFactorAuthenticationController;
use App\Http\Controllers\Api\V1\User\UpdateUserEmailNotificationPreferencesController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum','auth.two_factor'])
    ->prefix('user')
    ->group(function () {

        // ========== Saved Lists ==========
        Route::get('/courses/saved', GetUserSavedCourseController::class);
        Route::get('/learning-paths/saved', GetUserSavedLearningPathController::class);

        // ========== Referral Code ==========
        Route::get('/referral-code', GetUserReferralCodeController::class);

        // ========== Settings ==========
        Route::get('/email-notifications', GetEmailNotificationController::class);
        Route::patch('/notification-preferences/update', UpdateUserEmailNotificationPreferencesController::class)->middleware('verified');
        Route::put('/change-password', ChangePasswordController::class)->middleware('verified');
        Route::put('/change-email', ChangeEmailAddressController::class);
        Route::put('/profile', UpdateProfileController::class)->middleware('verified');
        Route::put('/profile-information', UpdateProfileInformationController::class)->middleware('verified');
        Route::put('/two-factor-authentication', UpdateTwoFactorAuthenticationController::class)->middleware('verified');

        // ========== My Learning ==========
        Route::get('/enrolled-courses', GetEnrolledCourseController::class);


        Route::apiResource('/reminders', ReminderController::class);
        Route::apiResource('/reminders', ReminderController::class);

        Route::get('/reminder/resources', GetResourcesForReminderController::class);

        Route::post('/sync/reminders/{reminder}/google-calendar', SyncReminderToGoogleCalendarController::class)->name("reminder.sync");


        Route::post('/enrolled-courses/{course}/mark-as-complete', [CourseCompletionController::class, 'markAsComplete']);
        Route::post('/enrolled-courses/{course}/unmark-as-complete', [CourseCompletionController::class, 'unmarkAsComplete']);
        Route::delete('/enrolled-courses/{course}/unenroll', RemovedFromEnrollmentCourseController::class);


    });
