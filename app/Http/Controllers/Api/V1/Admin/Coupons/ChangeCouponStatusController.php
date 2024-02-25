<?php

namespace App\Http\Controllers\Api\V1\Admin\Coupons;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChangeCouponStatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:coupons.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(Request $request, Coupon $coupon): JsonResponse|CouponResource
    {
        try {
            $request->validate(['is_redeemable' => ['required', Rule::in(['true', 'false', true, false])]]);

            $coupon->update(['is_redeemable' => filter_var($request->is_redeemable, FILTER_VALIDATE_BOOLEAN)]);

            return new CouponResource($coupon);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

}
