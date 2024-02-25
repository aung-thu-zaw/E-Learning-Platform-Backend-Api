<?php

namespace App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Catalogues\SubcategoryRequest;
use App\Http\Resources\Admin\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SubcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategories.view', ['only' => ['index']]);
        $this->middleware('permission:subcategories.create', ['only' => ['store']]);
        $this->middleware('permission:subcategories.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:subcategories.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $subcategories = Subcategory::filterSearch(request('search'))->with(['category'])
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))->paginate(request('per_page', 5))->appends(request()->all());

            return SubcategoryResource::collection($subcategories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(SubcategoryRequest $request): JsonResponse|SubcategoryResource
    {
        try {
            $subcategory = Subcategory::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);

            return new SubcategoryResource($subcategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Subcategory $subcategory): JsonResponse|SubcategoryResource
    {
        try {
            return new SubcategoryResource($subcategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(SubcategoryRequest $request, Subcategory $subcategory): JsonResponse|SubcategoryResource
    {
        try {
            $subcategory->update([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN),
            ]);

            return new SubcategoryResource($subcategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Subcategory $subcategory): Response|JsonResponse
    {
        try {
            $subcategory->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
