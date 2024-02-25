<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageAuthority;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\PermissionResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:permissions.view', ['only' => ['index']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $permissions = Permission::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return PermissionResource::collection($permissions);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }
}
