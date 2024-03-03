<?php

namespace App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SubcategoryResource;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeSubcategoryStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategories.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, Subcategory $subcategory): JsonResponse|SubcategoryResource
    {
        try {

            $request->validate(['status' => ['required', Rule::in(['true', 'false', true, false])]]);

            $subcategory->update(['status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN)]);

            $subcategory->update(['status' => $request->status]);

            return new SubcategoryResource($subcategory);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
