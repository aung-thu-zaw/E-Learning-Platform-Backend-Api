<?php

use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\BlogCategoryController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\ChangeBlogCategoryStatusController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified', 'user.role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::apiResource('blog-categories', BlogCategoryController::class);
        Route::put('/blog-categories/{blog_category}/change-status', ChangeBlogCategoryStatusController::class);

        // Route::apiResource('blog-contents', BlogContentController::class);
    });
