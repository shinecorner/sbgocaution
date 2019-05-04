<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\User;
use Spatie\Permission\Models\Role;
use App\Http\Resources\RoleResource;
use App\Http\Controllers\Controller;

class RoleController extends Controller
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

        return RoleResource::collection(Role::paginate($per_page));
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
            'name' => 'required|alpha_dash|unique:roles,name',
        ]);

        return new RoleResource(Role::create($request->all()));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $role = Role::find($id);
        return new RoleResource($role);
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
            'name' => 'required|alpha_dash|unique:roles,name,' . $id
        ]);

        $role = Role::find($id);

        return response()->json([
            "api_status" => $role->update($request->all()),
            "data" => $role
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
        $role = Role::find($id);

        if(is_null($role)) {
            return response()->json([
                "api_status" => false
            ], 404);
        }

        return response()->json([
            "api_status" => $role->delete()
        ], 200);
    }

    public function assignment(Request $request) {
        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);
        if(is_null($user) || is_null($role)){
            return response()->json([
                "api_status" => false
            ], 404);            
        }
        $user->assignRole($role);
        return response()->json([
            "api_status" => true
        ], 200);
    }

}
