<?php

use App\Http\Controllers\Api\V1\AbilityController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\BlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\CategoryBlogContentController;
use App\Http\Controllers\Api\V1\ELearning\Blogs\GetResourcesForBlogPageController;
use App\Http\Controllers\Api\V1\ELearning\BrowseCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetCoursesBasedOnUserInterest;
use App\Http\Controllers\Api\V1\ELearning\GetInterestTagBeginnerCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetNavTopBannerController;
use App\Http\Controllers\Api\V1\ELearning\GetNewAndPopularCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetRecommendedCourseForUserInterest;
use App\Http\Controllers\Api\V1\ELearning\GetRecommendedLearningPathController;
use App\Http\Controllers\Api\V1\ELearning\GetResourcesForBrowsingCourseController;
use App\Http\Controllers\Api\V1\ELearning\GetSearchResultController;
use App\Http\Controllers\Api\V1\ELearning\GetSkillTagController;
use App\Http\Controllers\Api\V1\ELearning\GetSliderController;
use App\Http\Controllers\Api\V1\ELearning\LearningPathController;
use App\Http\Controllers\Api\V1\ELearning\StripeSubscriptionController;
use App\Http\Controllers\Api\V1\ELearning\UserInterestTagController;
use App\Http\Controllers\Api\V1\ELearning\UserSavedCourseController;
use App\Http\Controllers\Api\V1\ELearning\UserSavedLearningPathController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user()->load('permissions:name');
});

Route::get('/user/abilities', AbilityController::class);

// ========== Courses ==========
Route::get('/courses/interests', GetCoursesBasedOnUserInterest::class)->middleware('auth:sanctum');
Route::get('/courses/interests/{tag_id}/beginner', GetInterestTagBeginnerCourseController::class)->middleware('auth:sanctum');
Route::get('/courses/recommended-for-user-interest', GetRecommendedCourseForUserInterest::class)->middleware('auth:sanctum');
Route::get('/learning-paths/recommended', GetRecommendedLearningPathController::class)->middleware('auth:sanctum');
Route::get('/courses/new-and-popular', GetNewAndPopularCourseController::class);
Route::get('/search', GetSearchResultController::class);

// ========== For User Interest Tag ==========
Route::get('/skill-tags', GetSkillTagController::class);

Route::get('/followed-tags', [UserInterestTagController::class, 'index'])->middleware('auth:sanctum');
Route::post('/follow-tag', [UserInterestTagController::class, 'followTag'])->middleware('auth:sanctum');
Route::post('/unfollow-tag', [UserInterestTagController::class, 'unFollowTag'])->middleware('auth:sanctum');

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

// ========== For Saved List ==========
Route::post('/courses/{course}/save', [UserSavedCourseController::class, 'saveCourse'])->middleware('auth:sanctum');
Route::delete('/courses/{course}/remove', [UserSavedCourseController::class, 'removeSavedCourse'])->middleware('auth:sanctum');
Route::post('/learning-paths/{learning_path}/save', [UserSavedLearningPathController::class, 'saveLearningPath'])->middleware('auth:sanctum');
Route::delete('/learning-paths/{learning_path}/remove', [UserSavedLearningPathController::class, 'removeSavedLearningPath'])->middleware('auth:sanctum');

// ========== Subscription Plan ==========
Route::get('/user/stripe-intent', [StripeSubscriptionController::class,"getUserSetupIntent"])->middleware('auth');
Route::post('/subscribe', [StripeSubscriptionController::class,"subscribe"])->middleware('auth');

require __DIR__.'/admin.php';
require __DIR__.'/instructor.php';
require __DIR__.'/user.php';
