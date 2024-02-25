<?php

namespace App\Http\Controllers\Api\V1\Admin\Catalogues\Categories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeCategoryStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:categories.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, Category $category): JsonResponse|CategoryResource
    {
        try {
            $request->validate(['status' => ['required', Rule::in(['true', 'false', true, false])]]);

            $category->update(['status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN)]);

            return new CategoryResource($category);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }
}
