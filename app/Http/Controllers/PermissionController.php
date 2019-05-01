<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Resources\PermissionResource;

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
            $per_page = config('pagination.items_per_page');
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

        return new PermissionResource(Permission::create($request->all()));
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

        return response()->json([
            "api_status" => $permission->update($request->all()),
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

        if(is_null($permission)) {
            return response()->json([
                "api_status" => false
            ], 404);
        }

        return response()->json([
            "api_status" => $permission->delete()
        ], 200);
    }

    public function assignment(Request $request) {
        $role = Role::find($request->role_id);
        $permission = Permission::find($request->permission_id);
        if(is_null($role) || is_null($permission)){
            return response()->json([
                "api_status" => false
            ], 404);            
        }
        $role->givePermissionTo($permission);
        return response()->json([
            "api_status" => true
        ], 200);
    }

}
