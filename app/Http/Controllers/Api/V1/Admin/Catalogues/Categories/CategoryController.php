<?php

namespace App\Http\Controllers\Api\V1\Admin\Catalogues\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalogues\CategoryRequest;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories.view', ['only' => ['index']]);
        $this->middleware('permission:categories.create', ['only' => ['store']]);
        $this->middleware('permission:categories.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:categories.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $categories = Category::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return CategoryResource::collection($categories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(CategoryRequest $request): JsonResponse|CategoryResource
    {
        try {


            $category = Category::create([
                'name' => $request->name,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);

            return new CategoryResource($category);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Category $category): JsonResponse|CategoryResource
    {
        try {
            return new CategoryResource($category);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(CategoryRequest $request, Category $category): JsonResponse|CategoryResource
    {
        try {

            $category->update([
                'name' => $request->name,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);


            return new CategoryResource($category);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Category $category): Response|JsonResponse
    {
        try {
            $category->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
