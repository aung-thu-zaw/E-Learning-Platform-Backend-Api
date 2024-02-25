<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents;

use App\Actions\Admin\BlogContents\CreateBlogContentAction;
use App\Actions\Admin\BlogContents\UpdateBlogContentAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageBlog\BlogContentRequest;
use App\Http\Resources\Admin\BlogContentResource;
use App\Models\BlogContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class BlogContentController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-contents.view', ['only' => ['index']]);
        $this->middleware('permission:blog-contents.create', ['only' => ['store']]);
        $this->middleware('permission:blog-contents.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:blog-contents.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $blogContents = BlogContent::filterSearch(request('search'))
            ->with(["author","blogCategory"])
            ->orderBy(request('sort', 'id'), request('direction', 'desc'))
            ->paginate(request('per_page', 5))
            ->appends(request()->all());

            return BlogContentResource::collection($blogContents);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(BlogContentRequest $request): JsonResponse|BlogContentResource
    {
        try {
            $blogContent = (new CreateBlogContentAction())->handle($request->validated());

            return new BlogContentResource($blogContent);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(BlogContent $blogContent): JsonResponse|BlogContentResource
    {
        try {
            return new BlogContentResource($blogContent);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(BlogContentRequest $request, BlogContent $blogContent): JsonResponse|BlogContentResource
    {
        try {
            $blogContent = (new UpdateBlogContentAction())->handle($request->validated(), $blogContent);

            return new BlogContentResource($blogContent);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(BlogContent $blogContent): Response|JsonResponse
    {
        try {
            $blogContent->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
