<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\LearningPath;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class UserSavedLearningPathController extends Controller
{
    public function saveLearningPath(LearningPath $learningPath): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->savedLearningPaths()->attach($learningPath->id);

            return response()->json(['message' => 'Learning path saved to list successfully!'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function removeSavedLearningPath(LearningPath $learningPath): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $user->savedLearningPaths()->detach($learningPath->id);

            return response()->json(['message' => 'Learning path removed from saved list.'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
