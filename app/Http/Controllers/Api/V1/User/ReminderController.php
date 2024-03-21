<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\ReminderRequest;
use App\Http\Resources\User\ReminderResource;
use App\Models\Reminder;
use App\Models\ReminderDay;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class ReminderController extends Controller
{
    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $reminder = Reminder::with(['reminderDays','course','user'])->where("user_id", auth()->id())->orderBy("id", "desc")->get();

            return ReminderResource::collection($reminder);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function store(ReminderRequest $request): JsonResponse|ReminderResource
    {
        try {
            $reminder = Reminder::create([
                'user_id' => auth()->id(),
                'course_id' => $request->course_id,
                'message' => $request->message,
                'frequency' => $request->frequency,
                'date' => $request->date ?? null,
                'time' => $request->time,
                'google_calendar_synced' => filter_var($request->google_calendar_synced, FILTER_VALIDATE_BOOLEAN),
            ]);

            if(isset($request->days)) {

                foreach($request->days as $day) {
                    ReminderDay::create(["reminder_id" => $reminder->id,"day" => $day]);

                }

            }

            return new ReminderResource($reminder);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function show(Reminder $reminder): JsonResponse|ReminderResource
    {
        try {
            $reminder->load(['reminderDays','course','user']);

            return new ReminderResource($reminder);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function update(ReminderRequest $request, Reminder $reminder): JsonResponse|ReminderResource
    {
        try {
            $reminder->update([
                'user_id' => auth()->id(),
                'course_id' => $request->course_id,
                'message' => $request->message,
                'frequency' => $request->frequency,
                'date' => $request->date,
                'time' => $request->time,
                'google_calendar_synced' => filter_var($request->google_calendar_synced, FILTER_VALIDATE_BOOLEAN),
            ]);

            if(isset($request->days)) {

                $currentReminderDays = $reminder->reminderDays->pluck('day');

                foreach ($request->days as $day) {
                    if (!$currentReminderDays->contains($day)) {
                        ReminderDay::create(["reminder_id" => $reminder->id, "day" => $day]);
                    }
                }

                foreach ($currentReminderDays as $currentDay) {
                    if (!in_array($currentDay, $request->days)) {
                        $reminder->reminderDays()->where('day', $currentDay)->delete();
                    }
                }
            }

            $reminder->load(['reminderDays','course','user']);

            return new ReminderResource($reminder);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Reminder $reminder): Response|JsonResponse
    {
        try {
            $reminder->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
