<?php

namespace App\Http\Controllers\Api\V1\Admin\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NewsletterRequest;
use App\Mail\NewsletterMail;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Mail;

class SendNewsletterController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:newsletter.send', ['only' => ['__invoke']]);
    }

    public function __invoke(NewsletterRequest $request): JsonResponse
    {
        try {
            $subscribers = NewsletterSubscriber::where('status', 'subscribed')->get();

            $subscribers->each(function ($subscriber) use ($request) {
                Mail::to($subscriber->email)->queue(new NewsletterMail($request->subject, $request->content));
            });

            return response()->json(['message' => 'Newsletter sent successfully!'], 200);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
