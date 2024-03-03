<?php

namespace App\Http\Controllers\Api\V1\Admin\Sliders;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SliderResource;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeSliderStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sliders.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, Slider $slider): JsonResponse|SliderResource
    {
        try {
            $request->validate(['status' => ['required', Rule::in(['true', 'false', true, false])]]);

            $slider->update(['status' => filter_var($request->status, FILTER_VALIDATE_BOOLEAN)]);

            return new SliderResource($slider);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
