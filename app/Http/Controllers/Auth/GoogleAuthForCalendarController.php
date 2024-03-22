<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Google_Service_Calendar_Event;
use Google_Client;
use Google_Service_Calendar;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class GoogleAuthForCalendarController extends Controller
{
    public function authenticate(): RedirectResponse
    {
        if(!session('google_access_token')) {

            $client = $this->createGoogleClient();

            return redirect($client->createAuthUrl());
        } else {

            return to_route('reminder.sync');
        }
    }

    public function callback(Request $request): JsonResponse|RedirectResponse
    {
        try {
            $client = $this->createGoogleClient();

            // Exchange authorization code for access token
            $client->fetchAccessTokenWithAuthCode($request->get('code'));

            // Store access token in session or database for future use
            $accessToken = $client->getAccessToken();

            // Example: store access token in session
            session(['google_access_token' => $accessToken]);

            // Redirect to a page after successful authentication
            // return response()->json(['message' => 'Google authentication successful.']);
            return redirect()->away(env("FRONTEND_URL").'/my-learning/learning-reminders');
        } catch (\Exception $e) {

            return response()->json(['error' => 'Failed to handle Google callback.', 'message' => $e->getMessage()], 500);
        }
    }

    private function createGoogleClient(): Google_Client
    {
        $client = new Google_Client();
        $client->setApplicationName(env('APP_NAME'));
        $client->setClientId(env('GOOGLE_CALENDAR_CLIENT_ID'));
        $client->setClientSecret(env('GOOGLE_CALENDAR_CLIENT_SECRET'));
        $client->setRedirectUri(env('GOOGLE_CALENDAR_CALLBACK'));
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        $client->setAccessType('offline'); // Enable offline access

        return $client;
    }
}
