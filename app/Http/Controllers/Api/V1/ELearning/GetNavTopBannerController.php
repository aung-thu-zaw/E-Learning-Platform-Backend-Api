<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\NavBanner;
use Illuminate\Http\JsonResponse;

class GetNavTopBannerController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $banner = NavBanner::select('description', 'url', 'button', 'countdown', 'start_date_time', 'end_date_time', 'is_active', 'is_manually_set')->where('is_active', true)->first();

            return response()->json($banner, 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
