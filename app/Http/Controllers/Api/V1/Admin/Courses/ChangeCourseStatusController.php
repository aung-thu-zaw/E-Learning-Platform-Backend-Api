<?php

namespace App\Http\Controllers\Api\V1\Admin\Courses;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BlogContentResource;
use App\Models\Course;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeCourseStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:courses.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, Course $course): JsonResponse|BlogContentResource
    {
        try {
            $request->validate(['status' => ['required', Rule::in(['draft', 'pending', 'published', 'rejected'])]]);

            if ($request->status === 'published') {

                $course->update(['status' => $request->status, 'published_at' => now()]);

            } else {

                $course->update(['status' => $request->status]);
            }

            return new BlogContentResource($course);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
