<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeBlogCategoryStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-categories.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, BlogCategory $blogCategory): JsonResponse|BlogCategoryResource
    {
        try {

            $request->validate(['status' => ['required', Rule::in(['true', 'false', true, false])]]);

            $blogCategory->update(['status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN)]);

            $blogCategory->update(['status' => $request->status]);

            return new BlogCategoryResource($blogCategory);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }
}
