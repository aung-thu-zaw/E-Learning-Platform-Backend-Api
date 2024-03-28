<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\LearningPathResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetUserSavedLearningPathController extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $user = User::findOrFail(auth()->id());

            $savedLearningPaths = $user->savedLearningPaths()->with(['creator', 'courses', 'savedByUsers'])->paginate(15);

            return LearningPathResource::collection($savedLearningPaths);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
