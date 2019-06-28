<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\User;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = User::latest();

        if($request->has('limit')) {
            $users = $query->paginate($request->limit);
        } else {
            $users = $query->paginate($request->per_page);
        }

        return UserResource::collection($users);
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'signature' => 'required',
            'digital_signature' => 'required'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'signature' => $request->signature,
            'digital_signature' => $request->digital_signature
        ]);

        if($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        if($user) 
        {
            $message = __('general.user.CREATE_SUCCESS');
        }
        else
        {
            $message = __('general.user.CREATE_FAILURE');
        }

        return response()->json([
            'message' => $message,
            'data' => new UserResource($user)
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
        //
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
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'required',
            'signature' => 'required',
            'digital_signature' => 'required'
        ]);
        $user = User::find($id);

        if($request->has('roles')) {
            $user->syncRoles($request->roles);
        }

        $status = $user->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'signature' => $request->signature,
                'digital_signature' => $request->digital_signature
        ]);

        if($status) 
        {
            $message = __('general.user.UPDATE_SUCCESS');
        }
        else
        {
            $message = __('general.user.UPDATE_FAILURE');
        }
        
        return response()->json([
            "message" => $message,
            "data" => new UserResource($user)
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
        //
    }

    public function change_status($id)
    {
        $user = User::find($id);
        $user->status = $user->status == 1 ? 0 : 1;
        if($user->save()) {
            $message = __('user.CHANGE_STATUS_SUCCESS');
        } else {
            $message = __('user.CHANGE_STATUS_FAILURE');
        }
        return response()->json([
            "message" => $message,
            "data" => new UserResource($user)
        ], 200);
    }
}
