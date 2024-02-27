<?php

namespace App\Http\Controllers\Api\V1\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\Category;
use App\Models\Course;
use App\Models\Subcategory;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetResourcesForCourseActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:courses.create', ['only' => ['__invoke']]);
        $this->middleware('permission:courses.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(): JsonResponse
    {
        try {
            $categories = Category::select('id', 'name')->where('status', true)->get();
            $subcategories = Subcategory::select('id', 'category_id', 'name')->where('status', true)->get();
            $tags = Tag::select("id", "category_id", "subcategory_id", "name")->get();
            $instructors = User::select("id", "display_name")->where("role", "instructor")->where("status", "active")->get();

            return response()->json([
                "categories" => $categories,
                "subcategories" => $subcategories,
                "tags" => $tags,
                "instructors" => $instructors
            ], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
