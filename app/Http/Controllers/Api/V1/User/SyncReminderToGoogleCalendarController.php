<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Models\Reminder;
use Carbon\Carbon;
use Google\Service\Calendar\Event;
use Google\Service\Calendar\EventDateTime;
use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class SyncReminderToGoogleCalendarController extends Controller
{
    public function __invoke(Reminder $reminder): JsonResponse|RedirectResponse
    {
        try {
            // Retrieve access token from session
            $accessToken = session('google_access_token');

            if (! $accessToken) {
                return response()->json(['error' => 'Google access token not found.'], 401);
            }

            // Set up Google client
            $client = new Google_Client();
            $client->setAccessToken($accessToken);

            // Check if access token is expired, if yes, refresh token
            if ($client->isAccessTokenExpired()) {
                $client->fetchAccessTokenWithRefreshToken($client->getRefreshToken());

                // Update access token in session or database
                $accessToken = $client->getAccessToken();
                // Example: update access token in session
                session(['google_access_token' => $accessToken]);
            }

            // Create Google Calendar service
            $calendarService = new Google_Service_Calendar($client);

            $event = $this->createEvent($reminder);

            // Insert event
            $calendarId = 'primary'; // Use primary calendar
            $event = $calendarService->events->insert($calendarId, $event);

            // Update reminder to mark as synced
            $reminder->update(['google_calendar_synced' => true]);

            return response()->json(['message' => 'Event added to Google Calendar successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to sync reminder to Google Calendar.', 'message' => $e->getMessage()], 500);
        }
    }

    private function createEvent(Reminder $reminder): Google_Service_Calendar_Event
    {
        $event = new Google_Service_Calendar_Event([
            'summary' => $reminder->message,
            'description' => $reminder->course->name,
        ]);

        if ($reminder->frequency === 'once') {
            // Concatenate date and time with a space in between
            $dateTime = $reminder->date.' '.$reminder->time;
            // Parse date/time with strtotime
            $timestamp = strtotime($dateTime);
            // Create Carbon instance from timestamp
            $carbonDateTime = Carbon::createFromTimestamp($timestamp, 'UTC');
            // Set start and end time based on the parsed date/time
            $eventStart = new EventDateTime();
            $eventStart->setDateTime($carbonDateTime->toIso8601String());
            $event->setStart($eventStart);

            // Adjust end time accordingly
            $eventEnd = new EventDateTime();
            $eventEnd->setDateTime($carbonDateTime->addMinutes(30)->toIso8601String());
            $event->setEnd($eventEnd);
        } else {
            // Set start time to current date/time
            $eventStart = new EventDateTime();
            $eventStart->setDateTime(Carbon::now()->toIso8601String());
            $event->setStart($eventStart);

            // End time can be adjusted as needed, here it's set to 30 minutes after start time
            $eventEnd = new EventDateTime();
            $eventEnd->setDateTime(Carbon::now()->addMinutes(30)->toIso8601String());
            $event->setEnd($eventEnd);

            if ($reminder->frequency === 'weekly') {
                // Set recurrence for weekly events based on reminder days
                $daysOfWeek = $reminder->reminderDays->pluck('day')->toArray();
                $event->setRecurrence(['RRULE:FREQ=WEEKLY;BYDAY='.implode(',', $daysOfWeek)]);
            } elseif ($reminder->frequency === 'daily') {
                // Set recurrence for daily events
                $event->setRecurrence(['RRULE:FREQ=DAILY']);
            }
        }

        return $event;
    }
}
