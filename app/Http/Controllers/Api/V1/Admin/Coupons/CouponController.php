<?php

namespace App\Http\Controllers\Api\V1\Admin\Coupons;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CouponRequest;
use App\Http\Resources\Admin\CouponResource;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:coupons.view', ['only' => ['index']]);
        $this->middleware('permission:coupons.create', ['only' => ['store']]);
        $this->middleware('permission:coupons.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:coupons.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $coupons = Coupon::search(request('search'))->orderBy(request('sort', 'id'), request('direction', 'desc'))->paginate(request('per_page', 5))->appends(request()->all());

            return CouponResource::collection($coupons);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(CouponRequest $request): JsonResponse|CouponResource
    {
        try {
            $coupon = Coupon::create([
                'code' => $request->code,
                'description' => $request->description,
                'type' => $request->type,
                'value' => $request->value,
                'max_uses' => $request->max_uses,
                'expiry_date' => $request->expiry_date,
                'free_trial_days' => $request->free_trial_days,
                'is_redeemable' => filter_var($request->is_redeemable, FILTER_VALIDATE_BOOLEAN)
            ]);

            return new CouponResource($coupon);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Coupon $coupon): JsonResponse|CouponResource
    {
        try {
            return new CouponResource($coupon);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(CouponRequest $request, Coupon $coupon): JsonResponse|CouponResource
    {
        try {
            $coupon->update([
                'code' => $request->code,
                'description' => $request->description,
                'type' => $request->type,
                'value' => $request->value,
                'max_uses' => $request->max_uses,
                'expiry_date' => $request->expiry_date,
                'free_trial_days' => $request->free_trial_days,
                'is_redeemable' => filter_var($request->is_redeemable, FILTER_VALIDATE_BOOLEAN)
            ]);

            return new CouponResource($coupon);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Coupon $coupon): Response|JsonResponse
    {
        try {
            $coupon->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
