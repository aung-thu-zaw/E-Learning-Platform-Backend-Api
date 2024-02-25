<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BlogContentResource;
use App\Models\BlogContent;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeBlogContentStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-contents.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, BlogContent $blogContent): JsonResponse|BlogContentResource
    {
        try {
            $request->validate(['status' => ['required', Rule::in(['published', 'hidden'])]]);

            if ($request->status === 'published') {

                $blogContent->update(['status' => $request->status, 'published_at' => now()]);

            } else {

                $blogContent->update(['status' => $request->status]);
            }

            return new BlogContentResource($blogContent);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
