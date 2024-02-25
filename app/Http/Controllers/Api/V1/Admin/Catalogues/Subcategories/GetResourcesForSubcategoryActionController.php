<?php

namespace App\Http\Controllers\Api\V1\Admin\Catalogues\Subcategories;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class GetResourcesForSubcategoryActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subcategories.create', ['only' => ['__invoke']]);
        $this->middleware('permission:subcategories.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(): JsonResponse
    {
        try {
            $categories = Category::select('id', 'name')->where('status', true)->get();

            return response()->json($categories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
