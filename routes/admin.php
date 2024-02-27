<?php

use App\Http\Controllers\Api\V1\Admin\Catalogues\Categories\CategoryController;
use App\Http\Controllers\Api\V1\Admin\Catalogues\Categories\ChangeCategoryStatusController;
use App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories\ChangeSubcategoryStatusController;
use App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories\GetResourcesForSubcategoryActionController;
use App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories\SubcategoryController;
use App\Http\Controllers\Api\V1\Admin\Coupons\ChangeCouponStatusController;
use App\Http\Controllers\Api\V1\Admin\Coupons\CouponController;
use App\Http\Controllers\Api\V1\Admin\Courses\ChangeCourseStatusController;
use App\Http\Controllers\Api\V1\Admin\Courses\CourseController;
use App\Http\Controllers\Api\V1\Admin\Courses\GetResourcesForCourseActionController;
use App\Http\Controllers\Api\V1\Admin\DatabaseBackupController;
use App\Http\Controllers\Api\V1\Admin\ManageAuthority\PermissionController;
use App\Http\Controllers\Api\V1\Admin\ManageAuthority\RoleController;
use App\Http\Controllers\Api\V1\Admin\ManageAuthority\AssignRolePermissions\AssignRolePermissionsController;
use App\Http\Controllers\Api\V1\Admin\ManageAuthority\AssignRolePermissions\GetResourcesForAssignRolePermissionsActionController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\BlogCategoryController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories\ChangeBlogCategoryStatusController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\BlogContentController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\ChangeBlogContentStatusController;
use App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents\GetResourcesForBlogContentActionController;
use App\Http\Controllers\Api\V1\Admin\NavBanners\ChangeNavBannerStatusController;
use App\Http\Controllers\Api\V1\Admin\NavBanners\NavBannerController;
use App\Http\Controllers\Api\V1\Admin\Newsletter\SendNewsletterController;
use App\Http\Controllers\Api\V1\Admin\Newsletter\SubscriberController;
use App\Http\Controllers\Api\V1\Admin\SkillTags\GetResourcesForTagActionController;
use App\Http\Controllers\Api\V1\Admin\SkillTags\TagController;
use App\Http\Controllers\Api\V1\Admin\Sliders\ChangeSliderStatusController;
use App\Http\Controllers\Api\V1\Admin\Sliders\SliderController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified', 'user.role:admin'])
    ->prefix('admin')
    ->group(function () {

        // ========== NavBanners ==========
        Route::apiResource('nav-banners', NavBannerController::class);
        Route::put('/nav-banners/{nav_banner}/change-status', ChangeNavBannerStatusController::class);

        // ========== Sliders ==========
        Route::apiResource('sliders', SliderController::class);
        Route::put('/sliders/{slider}/change-status', ChangeSliderStatusController::class);

        // ========== Coupons ==========
        Route::apiResource('coupons', CouponController::class);
        Route::put('/coupons/{coupon}/change-status', ChangeCouponStatusController::class);

        // ========== Catalogues ==========
        Route::apiResource('categories', CategoryController::class);
        Route::put('/categories/{category}/change-status', ChangeCategoryStatusController::class);

        Route::apiResource('subcategories', SubcategoryController::class);
        Route::put('/subcategories/{subcategory}/change-status', ChangeSubcategoryStatusController::class);
        Route::get('/subcategory-resources', GetResourcesForSubcategoryActionController::class);

        // ========== Skill Tag ==========
        Route::apiResource('tags', TagController::class);
        Route::get('/tag-resources', GetResourcesForTagActionController::class);

        // ========== Course ==========
        Route::apiResource('blog-contents', BlogContentController::class);
        Route::put('/blog-contents/{blog_content}/change-status', ChangeBlogContentStatusController::class);
        Route::get('/blog-content-resources', GetResourcesForBlogContentActionController::class);

        // ========== Newsletter ==========
        Route::apiResource('newsletter-subscribers', SubscriberController::class)->only(['index', 'destroy']);
        Route::post('/send-newsletter', SendNewsletterController::class);

        // ========== Manage Blog ==========
        Route::apiResource('blog-categories', BlogCategoryController::class);
        Route::put('/blog-categories/{blog_category}/change-status', ChangeBlogCategoryStatusController::class);

        Route::apiResource('courses', CourseController::class);
        Route::put('/courses/{course}/change-status', ChangeCourseStatusController::class);
        Route::get('/course-resources', GetResourcesForCourseActionController::class);

        // ========== Manage Authority ==========
        Route::get('/permissions', [PermissionController::class, 'index']);

        Route::apiResource('roles', RoleController::class);

        Route::get('/assign-role-permissions', [AssignRolePermissionsController::class, 'index']);
        Route::get('/assign-role-permissions/{role}', [AssignRolePermissionsController::class, 'show']);
        Route::patch('/assign-role-permissions/{role}', [AssignRolePermissionsController::class, 'update']);
        Route::get('/assign-role-permissions-resources', GetResourcesForAssignRolePermissionsActionController::class);


        // ========== Backup ==========
        Route::controller(DatabaseBackupController::class)
        ->prefix('/database-backups')
        ->name('admin.database-backups.')
        ->group(function () {
            Route::get('/', 'index')->name('index');
            Route::post('/', 'backup')->name('backup');
            Route::delete('/{file}', 'destroy')->name('destroy');
            Route::get('/{file}/download', 'download')->name('download');
        });
    });
