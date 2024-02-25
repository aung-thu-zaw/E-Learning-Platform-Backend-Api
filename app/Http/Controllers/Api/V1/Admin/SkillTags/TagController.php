<?php

namespace App\Http\Controllers\Api\V1\Admin\SkillTags;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\TagRequest;
use App\Http\Resources\Admin\TagResource;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:tags.view', ['only' => ['index']]);
        $this->middleware('permission:tags.create', ['only' => ['store']]);
        $this->middleware('permission:tags.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:tags.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $tags = Tag::filterSearch(request('search'))
                ->with(['category', 'subcategory'])
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return TagResource::collection($tags);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(TagRequest $request): JsonResponse|TagResource
    {
        try {
            $tag = Tag::create([
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
            ]);

            return new TagResource($tag);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Tag $tag): JsonResponse|TagResource
    {
        try {
            return new TagResource($tag);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(TagRequest $request, Tag $tag): JsonResponse|TagResource
    {
        try {
            $tag->update([
                 'category_id' => $request->category_id,
                 'subcategory_id' => $request->subcategory_id,
                 'name' => $request->name,
             ]);

            return new TagResource($tag);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Tag $tag): Response|JsonResponse
    {
        try {
            $tag->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
