<?php

namespace App\Http\Controllers\Api\V1\ELearning\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blogs\CategoryBlogContentResource;
use App\Models\BlogCategory;
use App\Models\BlogContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class CategoryBlogContentController extends Controller
{
    public function __invoke(BlogCategory $blogCategory): JsonResponse|AnonymousResourceCollection
    {
        try {
            $blogContent = BlogContent::with(['author', 'blogCategory'])
                ->where('blog_category_id', $blogCategory->id)
                ->where('status', 'published')
                ->orderBy('id', 'desc')
                ->paginate(12)
                ->withQueryString();

            return CategoryBlogContentResource::collection($blogContent);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
