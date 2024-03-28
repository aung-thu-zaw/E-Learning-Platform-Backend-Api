<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class GetVideoController extends Controller
{
    public function introVideo(string $introVideoFileName): JsonResponse|BinaryFileResponse
    {
        try {
            if (Storage::disk('public')->exists("courses/intro-videos/$introVideoFileName")) {

                $filePath = Storage::disk('public')->path("courses/intro-videos/$introVideoFileName");

                return response()->file($filePath, [
                    'Content-Type' => 'video/mp4',
                    'Content-Disposition' => 'inline',
                ]);
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function lessonVideo(string $lessonVideoFileName): JsonResponse|BinaryFileResponse
    {
        try {
            if (Storage::disk('public')->exists("courses/lessons/$lessonVideoFileName")) {

                $filePath = Storage::disk('public')->path("courses/lessons/$lessonVideoFileName");

                return response()->file($filePath, [
                    'Content-Type' => 'video/mp4',
                    'Content-Disposition' => 'inline',
                ]);
            } else {
                abort(404);
            }
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
