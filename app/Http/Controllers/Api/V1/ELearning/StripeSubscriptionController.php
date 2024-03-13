<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class StripeSubscriptionController extends Controller
{
    public function getUserSetupIntent(): JsonResponse
    {
        $user = User::findOrFail(auth()->id());

        return response()->json(["intent" => $user->createSetupIntent()]);
    }

    public function subscribe(Request $request): JsonResponse
    {
        $request->validate([
            "subscription_plan" => ["required"],
            "payment_method" => ["required"]
        ]);

        $user = User::findOrFail(auth()->id());

        $user->newSubscription('cashier', $request->subscription_plan)->create($request->payment_method);

        return response()->json(["message" => "Subscription successful!"]);
    }
}
