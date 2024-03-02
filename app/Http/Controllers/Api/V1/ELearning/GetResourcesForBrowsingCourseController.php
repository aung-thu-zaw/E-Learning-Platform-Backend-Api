<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GetResourcesForBrowsingCourseController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $categories = Category::select('id', 'name', 'slug')->where('status', true)->get();
            $subcategories = Subcategory::select('id', 'category_id', 'name', 'slug', 'description', 'image')->where('status', true)->get();
            $tags = Tag::select('id', 'category_id', 'subcategory_id', 'name', 'slug')->get();

            return response()->json([
                "categories" => $categories,
                "subcategories" => $subcategories,
                "tags" => $tags
            ]);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
