<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class GetUserReferralCodeController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $referralCode = $user->referralCode()->select('user_id', 'code')->first();

            return response()->json($referralCode);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
