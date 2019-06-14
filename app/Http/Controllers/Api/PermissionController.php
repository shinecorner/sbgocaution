<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('per_page')){
            $per_page = $request->per_page;
        } else {
            $per_page = config('general.items_per_page');
        }

        return PermissionResource::collection(Permission::paginate($per_page));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|alpha_dash|unique:permissions,name',
        ]);

        $permission = Permission::create($request->all());

        if($permission) 
        {
            $message = __('general.permission.CREATE_SUCCESS');
        }
        else
        {
            $message = __('general.permission.CREATE_FAILURE');
        }

        return response()->json([
            'message' => $message,
            'data' => new PermissionResource($permission)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::find($id);
        return new PermissionResource($permission);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|alpha_dash|unique:permissions,name,' . $id
        ]);

        $permission = Permission::find($id);

        if($permission->update($request->all())) 
        {
            $message = __('general.permission.UPDATE_SUCCESS');
        }
        else
        {
            $message = __('general.permission.UPDATE_FAILURE');
        }

        return response()->json([
            "message" => $message,
            "data" => $permission
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $permission = Permission::find($id);

        if($permission->delete()) 
        {
            $message = __('general.permission.DELETE_SUCCESS');
        }
        else
        {
            $message = __('general.permission.DELETE_FAILURE');
        }

        return response()->json([
            "message" => $message
        ], 200);
    }

    /**
     * Assign permission to role.
     * 
     * @param  Request
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function assignment(Request $request) {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);

        if($role->givePermissionTo($permission))
        {
            $message = __('general.permission.ASSIGNMENT_SUCCESS');
        }
        else
        {
            $message = __('general.permission.ASSIGNMENT_FAILURE');
        }
        return response()->json([
            "message" => $message
        ], 200);
    }

}
