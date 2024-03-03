<?php

namespace App\Http\Controllers\Api\V1\Instructor\Courses;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;

class GetResourcesForCourseActionController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $categories = Category::select('id', 'name')->where('status', true)->get();
            $subcategories = Subcategory::select('id', 'category_id', 'name')->where('status', true)->get();
            $tags = Tag::select('id', 'category_id', 'subcategory_id', 'name')->get();

            return response()->json([
                'categories' => $categories,
                'subcategories' => $subcategories,
                'tags' => $tags,
            ], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
