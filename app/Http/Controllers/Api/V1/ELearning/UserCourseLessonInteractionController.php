<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Lesson;
use App\Models\LessonWatchTime;
use Illuminate\Http\JsonResponse;

class UserCourseLessonInteractionController extends Controller
{
    public function startLessonView(Lesson $lesson): JsonResponse
    {
        try {
            $existingView = LessonWatchTime::where('user_id', auth()->id())->where('lesson_id', $lesson->id)->first();

            if ($existingView) {
                return response()->json(['message' => 'User has already started watching this lesson.'], 400);
            }

            LessonWatchTime::create([
                'user_id' => auth()->id(),
                'lesson_id' => $lesson->id,
                'start_time' => now(),
            ]);

            return response()->json(['message' => 'Lesson view started successfully.'], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }

    }

    public function endLessonView(Lesson $lesson): JsonResponse
    {
        try {
            $lessonView = LessonWatchTime::where('user_id', auth()->id())
                ->where('lesson_id', $lesson->id)
                ->first();

            if (! $lessonView) {
                return response()->json(['message' => 'User has not started watching this lesson.'], 400);
            }

            $startTime = $lessonView->start_time;
            $endTime = now();
            $duration = $endTime->diffInSeconds($startTime);

            $lessonView->update([
                'end_time' => $endTime,
                'watch_time_seconds' => $duration,
            ]);

            return response()->json(['message' => 'Lesson view ended successfully.'], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
