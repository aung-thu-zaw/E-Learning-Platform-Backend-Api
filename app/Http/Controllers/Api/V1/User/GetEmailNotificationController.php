<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;

class GetEmailNotificationController extends Controller
{
    public function __invoke(): JsonResponse
    {
        try {

            $user = User::findOrFail(auth()->id());

            $emailNotifications = $user->emailNotifications()->select('name', 'description')->get();

            return response()->json($emailNotifications);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
