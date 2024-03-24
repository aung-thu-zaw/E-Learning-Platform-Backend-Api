<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\LearningPathResource;
use App\Models\LearningPath;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class LearningPathController extends Controller
{
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $learningPaths = LearningPath::with(['creator', 'courses','savedByUsers'])
                ->where('status', true)
                ->orderBy('id', 'desc')
                ->paginate(3)
                ->appends(request()->all());

            return LearningPathResource::collection($learningPaths);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(LearningPath $learningPath): JsonResponse|LearningPathResource
    {
        try {
            $learningPath->load(['creator', 'courses','savedByUsers']);

            return new LearningPathResource($learningPath);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
