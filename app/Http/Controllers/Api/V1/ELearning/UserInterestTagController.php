<?php

namespace App\Http\Controllers\Api\V1\ELearning;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserInterestTagController extends Controller
{
    public function index(): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $tags = $user->interests()->select("id", "name")->get();

            return response()->json($tags);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function followTag(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'tag_id' => ['required', 'numeric', Rule::exists('tags', 'id')],
            ]);

            $user = User::findOrFail(auth()->id());

            $user->interests()->attach($request->tag_id);

            return response()->json(['message' => 'Tag followed successfully']);
        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }

    public function unFollowTag(Request $request): JsonResponse
    {
        try {
            $request->validate([
                'tag_id' => ['required', 'numeric', Rule::exists('tags', 'id')],
            ]);

            $user = User::findOrFail(auth()->id());

            $user->interests()->detach($request->tag_id);

            return response()->json(['message' => 'Tag unfollowed successfully']);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
