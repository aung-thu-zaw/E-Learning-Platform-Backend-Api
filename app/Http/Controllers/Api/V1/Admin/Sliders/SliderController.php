<?php

namespace App\Http\Controllers\Api\V1\Admin\Sliders;

use App\Actions\Admin\Sliders\CreateSliderAction;
use App\Actions\Admin\Sliders\UpdateSliderAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SliderRequest;
use App\Http\Resources\Admin\SliderResource;
use App\Models\Slider;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SliderController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:sliders.view', ['only' => ['index']]);
        $this->middleware('permission:sliders.create', ['only' => ['store']]);
        $this->middleware('permission:sliders.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:sliders.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $sliders = Slider::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return SliderResource::collection($sliders);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(SliderRequest $request): JsonResponse|SliderResource
    {
        try {
            $slider = (new CreateSliderAction())->handle($request->validated());

            return new SliderResource($slider);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Slider $slider): JsonResponse|SliderResource
    {
        try {
            return new SliderResource($slider);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(SliderRequest $request, Slider $slider): JsonResponse|SliderResource
    {
        try {
            $slider = (new UpdateSliderAction())->handle($request->validated(), $slider);

            return new SliderResource($slider);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Slider $slider): Response|JsonResponse
    {
        try {
            $slider->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
