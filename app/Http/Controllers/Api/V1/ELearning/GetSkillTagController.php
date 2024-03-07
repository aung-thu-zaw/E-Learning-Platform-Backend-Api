<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;

class GetSkillTagController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $tags = Tag::select('id', 'name')->get();

            return response()->json($tags);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
