<?php

namespace App\Http\Controllers\Api\V1\ELearning\Blogs;

use App\Http\Controllers\Controller;
use App\Http\Resources\Blogs\BlogContentResource;
use App\Models\BlogContent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class BlogContentController extends Controller
{
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $blogContent = BlogContent::search(request('query'))
            ->query(function (Builder $builder) {
                $builder->with(["author","blogCategory"]);
            })
            ->where('status', 'published')
            ->orderBy("id", "desc")
            ->paginate(15)
            ->appends(request()->all());

            return BlogContentResource::collection($blogContent);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(BlogContent $blogContent): JsonResponse
    {
        try {
            $blogContent->load(["author","blogCategory"]);

            $relatedBlogContents = BlogContent::with(["author","blogCategory"])
                ->where('blog_category_id', $blogContent->blog_category_id)
                ->where('slug', '!=', $blogContent->slug)
                ->inRandomOrder()
                ->limit(6)
                ->get();

            $blogContentResource = new BlogContentResource($blogContent);
            $relatedBlogContentResource = BlogContentResource::collection($relatedBlogContents);


            return response()->json([
                "content" => $blogContentResource,
                "relatedContents" => $relatedBlogContentResource,
            ], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
