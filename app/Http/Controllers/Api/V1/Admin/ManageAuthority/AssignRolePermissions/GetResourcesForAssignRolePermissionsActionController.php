<?php

namespace App\Http\Controllers\Api\V1\Admin\ManageAuthority\AssignRolePermissions;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

class GetResourcesForAssignRolePermissionsActionController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:assign-role-permissions.edit', ['only' => ['__invoke']]);
    }

    public function __invoke(): JsonResponse
    {
        try {
            $permissionGroups = DB::table('permissions')
                ->select('group')
                ->groupBy('group')
                ->get();

            $permissions = Permission::get();

            return response()->json([
                'permissions' => $permissions,
                'permissionGroups' => $permissionGroups,
            ], 200);

        } catch (\Exception $e) {
            return $this->apiExceptionResponse($e);
        }
    }
}
