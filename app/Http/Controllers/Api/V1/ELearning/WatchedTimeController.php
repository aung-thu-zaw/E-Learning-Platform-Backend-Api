<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonWatchTime;
use App\Models\WatchedTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class WatchedTimeController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
            $validatedData = $request->validate([
                'course_id' => ["required",Rule::exists("courses", "id")],
                'lesson_id' => ["required",Rule::exists("lessons", "id")],
                'watched_time' => ["required","numeric","min:0"]
            ]);

            $watchedTime = WatchedTime::updateOrCreate(
                [
                'user_id' => auth()->id(),
                'course_id' => $validatedData['course_id'],
                'lesson_id' => $validatedData['lesson_id']
                ],
                ['watched_time' => DB::raw('watched_time + ' . $validatedData['watched_time'])]
            );

            return response()->json($watchedTime, 201);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
