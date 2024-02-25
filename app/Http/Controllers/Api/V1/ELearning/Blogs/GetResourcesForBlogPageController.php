<?php

namespace App\Http\Controllers\Api\V1\ELearning\Blogs;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetResourcesForBlogPageController extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $categories = BlogCategory::select('name', 'slug')->withCount('blogContents')->where('status', true)->get();

            return response()->json($categories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
