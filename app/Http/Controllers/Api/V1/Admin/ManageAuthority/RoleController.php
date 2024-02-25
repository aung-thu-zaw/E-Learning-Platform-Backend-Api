<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageAuthority;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ManageAuthority\RoleRequest;
use App\Http\Resources\Admin\RoleResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Response;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:roles.view', ['only' => ['index']]);
        $this->middleware('permission:roles.create', ['only' => ['store']]);
        $this->middleware('permission:roles.edit', ['only' => ['show', 'update']]);
        $this->middleware('permission:roles.delete', ['only' => ['destroy']]);
    }

    public function index(): JsonResponse|AnonymousResourceCollection
    {
        try {
            $roles = Role::search(request('search'))
                ->orderBy(request('sort', 'id'), request('direction', 'desc'))
                ->paginate(request('per_page', 5))
                ->appends(request()->all());

            return RoleResource::collection($roles);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }

    public function show(Role $role): JsonResponse|RoleResource
    {
        try {
            return new RoleResource($role);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }

    public function store(RoleRequest $request): JsonResponse|RoleResource
    {
        try {
            $role = Role::create(['name' => $request->name,'guard_name' => 'web']);

            return new RoleResource($role);

        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }

    public function update(RoleRequest $request, Role $role): JsonResponse|RoleResource
    {
        try {
            $role->update(["name" => $request->name]);

            return new RoleResource($role);
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }

    public function destroy(Role $role): Response|JsonResponse
    {
        try {
            $role->delete();

            return response()->noContent();
        } catch (\Exception $e) {
            $this->apiExceptionResponse($e);
        }
    }
}
