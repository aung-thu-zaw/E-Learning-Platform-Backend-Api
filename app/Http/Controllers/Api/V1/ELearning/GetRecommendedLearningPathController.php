<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Http\Resources\ELearning\LearningPathResource;
use App\Models\LearningPath;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetRecommendedLearningPathController extends Controller
{
    public function __invoke(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $user = User::findOrFail(auth()->id());

            $userInterestIds = $user->interests()->pluck('id');

            $learningPaths = LearningPath::with(['creator', 'courses'])
                ->whereHas('tags', function ($query) use ($userInterestIds) {
                    $query->whereIn('id', $userInterestIds);
                })
            ->where('status', true)
            ->orderBy('id', 'desc')
            ->take(3)
            ->get();

            return LearningPathResource::collection($learningPaths);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
