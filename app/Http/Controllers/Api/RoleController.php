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
        if($request->has('per_page')) {
            $per_page = $request->per_page;
        } else {
            $per_page = config('general.items_per_page');
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

        $role = Role::create($request->all());

        if($role) 
        {
            $message = __('general.role.CREATE_SUCCESS');
        }
        else
        {
            $message = __('general.role.CREATE_FAILURE');
        }

        return response()->json([
            'message' => $message,
            'data' => new RoleResource($role)
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
        $data = [];

        $role = Role::find($id);
        $data['data'] = new RoleResource($role); 

        $helpers = [
            'other' => [
                'role_permissions'
            ]
        ];

        $this->responseHelper($data, $helpers);

        return response()->json($data, 200);
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

        if($role->update($request->all())) 
        {
            $message = __('general.role.UPDATE_SUCCESS');
        }
        else
        {
            $message = __('general.role.UPDATE_FAILURE');
        }

        return response()->json([
            "message" => $message,
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

        if($role->delete()) 
        {
            $message = __('general.role.DELETE_SUCCESS');
        }
        else
        {
            $message = __('general.role.DELETE_FAILURE');
        }

        return response()->json([
            "message" => $message
        ], 200);
    }

    /**
     * Assign user to role.
     * 
     * @param  Request
     * 
     * @return \Illuminate\Http\Response
     * 
     */
    public function assignment(Request $request) {
        $user = User::find($request->user_id);
        $role = Role::find($request->role_id);
        if($user->assignRole($role))
        {
            $message = __('general.role.ASSIGNMENT_SUCCESS');
        }
        else
        {
            $message = __('general.role.ASSIGNMENT_FAILURE');
        }
        return response()->json([
            "message" => $message
        ], 200);
    }

}
