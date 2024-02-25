<?php

namespace App\Http\Controllers\Api\V1\Admin\NavBanners;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\NavBannerResource;
use App\Models\NavBanner;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeNavBannerStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:nav-banners.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, NavBanner $navBanner): JsonResponse|NavBannerResource
    {
        try {
            $request->validate(['is_active' => ['required', Rule::in(['true', 'false', true, false])]]);

            $activeNavBanners = NavBanner::where("is_active", true)->where("id", "!=", $navBanner->id)->get();

            $activeNavBanners->each(function ($activeNavBanner) {
                $activeNavBanner->update(["is_active" => false]);
            });

            $navBanner->update(['is_active' => filter_var($request->is_active, FILTER_VALIDATE_BOOLEAN),'is_manually_set' => true]);

            return new NavBannerResource($navBanner);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
