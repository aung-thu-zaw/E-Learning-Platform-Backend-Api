<?php

namespace App\Http\Controllers\Api\V1\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UpdateProfileInformationRequest;
use App\Http\Traits\ImageUpload;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;

class UpdateProfileInformationController extends Controller
{
    use ImageUpload;

    public function __invoke(UpdateProfileInformationRequest $request): JsonResponse
    {
        try {
            $user = User::findOrFail(auth()->id());

            $avatar = isset($request->avatar) && ! is_string($request->avatar) ? $this->updateImage($request->avatar, $user->avatar, 'avatars') : $user->avatar;

            $user->update([
                "display_name" => $request->display_name,
                "headline" => $request->headline,
                "about_me" => $request->about_me,
                "facebook_url" => $request->facebook_url,
                "twitter_url" => $request->twitter_url,
                "instagram_url" => $request->instagram_url,
                "pinterest_url" => $request->pinterest_url,
                "youtube_url" => $request->youtube_url,
                "github_url" => $request->github_url,
                "personal_website_url" => $request->personal_website_url,
                "avatar" => $avatar,

            ]);

            return response()->json(["message" => "Profile information updated successfully."]);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
