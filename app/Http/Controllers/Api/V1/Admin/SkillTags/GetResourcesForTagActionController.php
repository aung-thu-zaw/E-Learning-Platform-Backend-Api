<?php

namespace App\Http\Controllers\Api\V1\Admin\SkillTags;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\JsonResponse;

class GetResourcesForTagActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tags.create', ['only' => ['__invoke']]);
        $this->middleware('permission:tags.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(): JsonResponse
    {
        try {
            $categories = Category::select('id', 'name')->where('status', true)->get();
            $subcategories = Subcategory::select('id', 'category_id', 'name')->where('status', true)->get();

            return response()->json([
                "categories" => $categories,
                "subcategories" => $subcategories
        ]);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
