<?php

namespace App\Http\Controllers\Api\V1\Admin\Newsletter;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\NewsletterSubscriberResource;
use App\Models\NewsletterSubscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;

class SubscriberController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:subscribers.view', ['only' => ['index']]);
        $this->middleware('permission:subscribers.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $subscribers = NewsletterSubscriber::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return NewsletterSubscriberResource::collection($subscribers);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function destroy(NewsletterSubscriber $newsletterSubscriber): Response|JsonResponse
    {
        try {
            $newsletterSubscriber->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
