<?php

namespace App\Http\Controllers\Api\V1\Admin\NavBanners;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NavBannerRequest;
use App\Http\Resources\Admin\NavBannerResource;
use App\Models\NavBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class NavBannerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:nav-banners.view', ['only' => ['index']]);
        $this->middleware('permission:nav-banners.create', ['only' => ['store']]);
        $this->middleware('permission:nav-banners.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:nav-banners.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $navBanners = NavBanner::search(request('search'))->orderBy(request('sort', 'id'), request('direction', 'desc'))->paginate(request('per_page', 5))->appends(request()->all());

            return NavBannerResource::collection($navBanners);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(NavBannerRequest $request): JsonResponse|NavBannerResource
    {
        try {
            $navBanner = NavBanner::create([
                'description' => $request->description,
                'url' => $request->url,
                'button' => $request->button,
                'countdown' => $request->countdown ?? null,
                'start_date_time' => $request->start_date_time,
                'end_date_time' => $request->end_date_time,
            ]);

            return new NavBannerResource($navBanner);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(NavBanner $navBanner): JsonResponse|NavBannerResource
    {
        try {
            return new NavBannerResource($navBanner);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(NavBannerRequest $request, NavBanner $navBanner): JsonResponse|NavBannerResource
    {
        try {
            $navBanner->update([
                'description' => $request->description,
                'url' => $request->url,
                'button' => $request->button,
                'countdown' => $request->countdown ?? null,
                'start_date_time' => $request->start_date_time,
                'end_date_time' => $request->end_date_time,
            ]);

            return new NavBannerResource($navBanner);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(NavBanner $navBanner): Response|JsonResponse
    {
        try {
            $navBanner->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
