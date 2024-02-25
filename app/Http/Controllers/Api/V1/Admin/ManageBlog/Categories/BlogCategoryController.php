<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageBlog\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageBlog\BlogCategoryRequest;
use App\Http\Resources\Admin\BlogCategoryResource;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BlogCategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-categories.view', ['only' => ['index']]);
        $this->middleware('permission:blog-categories.create', ['only' => ['store']]);
        $this->middleware('permission:blog-categories.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:blog-categories.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $blogCategories = BlogCategory::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return BlogCategoryResource::collection($blogCategories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(BlogCategoryRequest $request): JsonResponse|BlogCategoryResource
    {
        try {
            $blogCategory = BlogCategory::create([
                'name' => $request->name,
                'description' => $request->description,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);

            return new BlogCategoryResource($blogCategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(BlogCategory $blogCategory): JsonResponse|BlogCategoryResource
    {
        try {
            return new BlogCategoryResource($blogCategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(BlogCategoryRequest $request, BlogCategory $blogCategory): JsonResponse|BlogCategoryResource
    {
        try {
            $blogCategory->update([
                'name' => $request->name,
                'description' => $request->description,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);

            return new BlogCategoryResource($blogCategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(BlogCategory $blogCategory): Response|JsonResponse
    {
        try {
            $blogCategory->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
