<?php

use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\BlogCategoryController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\ChangeBlogCategoryStatusController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\BlogContentController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\ChangeBlogContentStatusController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\GetResourcesForBlogContentActionController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified', 'user.role:admin'])
    ->prefix('admin')
    ->group(function () {
        Route::apiResource('blog-categories', BlogCategoryController::class);
        Route::put('/blog-categories/{blog_category}/change-status', ChangeBlogCategoryStatusController::class);

        Route::apiResource('blog-contents', BlogContentController::class);
        Route::put('/blog-contents/{blog_content}/change-status', ChangeBlogContentStatusController::class);
        Route::get('/blog-content-resources', GetResourcesForBlogContentActionController::class);
    });
