<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateUserEmailNotificationPreferencesController extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'email_notification_id' => ['required', 'numeric', Rule::exists('email_notifications', 'id')],
            ]);

            $user = User::findOrFail(auth()->id());

            $pivotData = $user->emailNotifications()->where('id', $request->email_notification_id)->first()->pivot ?? null;

            if ($pivotData) {
                $enabled = $pivotData->enabled;

                $user->emailNotifications()->syncWithoutDetaching([$request->email_notification_id => ['enabled' => ! $enabled]]);

                $message = $enabled ? 'Notification disabled successfully.' : 'Notification enabled successfully.';
            } else {
                $message = 'Email notification not found.';
            }

            return response()->json(['message' => $message]);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
