<?php

use App\Http\Controllers\Api\V1\AbilityController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\BlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\CategoryBlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\GetResourcesForBlogPageController;
use App\Http\Controllers\Api\V1\ELearning\BrowseCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetCoursesBasedOnUserInterest;
use App\Http\Controllers\Api\V1\ELearning\GetNavTopBannerController;
use App\Http\Controllers\Api\V1\ELearning\GetNewAndPopularCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetResourcesForBrowsingCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetSkillTagController;
use App\Http\Controllers\Api\V1\ELearning\GetSliderController;
use App\Http\Controllers\Api\V1\ELearning\LearningPathController;
use App\Http\Controllers\Api\V1\ELearning\UserInterestTagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user()->load('permissions:name');
});

Route::get('/user/abilities', AbilityController::class);

// ========== Courses ==========
Route::get('/courses/interests', GetCoursesBasedOnUserInterest::class)->middleware("auth");
Route::get('/courses/new-and-popular', GetNewAndPopularCourseController::class);

// ========== For User Interest Tag ==========
Route::get('/skill-tags', GetSkillTagController::class);

Route::get('/followed-tags', [UserInterestTagController::class, 'index'])->middleware("auth");
Route::post('/follow-tag', [UserInterestTagController::class, 'followTag'])->middleware("auth");
Route::post('/unfollow-tag', [UserInterestTagController::class, 'unFollowTag'])->middleware("auth");

// ========== For Blog Page ==========
Route::get('/content/resources', GetResourcesForBlogPageController::class);
Route::get('/categories/{blog_category}/contents', CategoryBlogContentController::class);
Route::get('/contents', [BlogContentController::class, 'index']);
Route::get('/contents/{blog_content}', [BlogContentController::class, 'show']);

// ========== For Nav Banner ==========
Route::get('/nav-banner', GetNavTopBannerController::class);

// ========== For Slider ==========
Route::get('/sliders', GetSliderController::class);

// ========== For Browsing Course ==========
Route::get('/resources-for-browsing-course', GetResourcesForBrowsingCourseController::class);
Route::get('/browse/{subcategory_id}/courses', [BrowseCourseController::class, 'index']);

// ========== For Learning Path ==========
Route::get('/learning-paths', [LearningPathController::class, 'index']);
Route::get('/learning-paths/{learning_path}', [LearningPathController::class, 'show']);

require __DIR__.'/admin.php';
require __DIR__.'/instructor.php';
