<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class AbilityController extends Controller
{
    public function __invoke(): JsonResponse
    {
        $abilities = auth()->user() ? auth()->user()->permissions->pluck('name')->all() : [];

        return response()->json($abilities);
    }
}
