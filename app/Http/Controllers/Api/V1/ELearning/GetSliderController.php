<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;

class GetSliderController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $sliders = Slider::select('title', 'description', 'button', 'url', 'image')->where('status', true)->get();

            return response()->json($sliders, 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
