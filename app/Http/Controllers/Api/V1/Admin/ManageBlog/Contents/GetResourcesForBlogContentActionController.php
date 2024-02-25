<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageBlog\Contents;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Illuminate\Http\JsonResponse;

class GetResourcesForBlogContentActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-categories.create', ['only' => ['__invoke']]);
        $this->middleware('permission:blog-categories.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(): JsonResponse
    {
        try {
            $categories = BlogCategory::select('id', 'name')->where('status', true)->get();

            return response()->json($categories);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
