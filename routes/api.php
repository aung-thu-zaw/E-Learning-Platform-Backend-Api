<?php

use App\Http\Controllers\Api\V1\AbilityController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\BlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\CategoryBlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\GetResourcesForBlogPageController;
use App\Http\Controllers\Api\V1\ELearning\GetNavTopBannerController;
use App\Http\Controllers\Api\V1\ELearning\GetSliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user()->load('permissions:name');
});

Route::get('/user/abilities', AbilityController::class);

// ********** For Blog Page **********
Route::get('/content/resources', GetResourcesForBlogPageController::class);
Route::get('/categories/{blog_category}/contents', CategoryBlogContentController::class);
Route::get('/contents', [BlogContentController::class, 'index']);
Route::get('/contents/{blog_content}', [BlogContentController::class, 'show']);

// ********** For Nav Banner **********
Route::get('/nav-banner', GetNavTopBannerController::class);

// ********** For Slider **********
Route::get('/sliders', GetSliderController::class);


require __DIR__.'/admin.php';
require __DIR__.'/instructor.php';
