<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User::all();
        return response()->json([
            'users' => $users
        ]);
    }
    public function store(Request $request)
    {

        $user = User::create([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        return response()->json([
            "message" => 'user created succesfully',
            'user' => $user
        ]);
    }
    public function show(string $id)
    {
        $user = User::find($id);
        return response()->json([
            'message' => 'user found',
            'user' => $user
        ]);
    }
    public function update(Request $request, string $id)
    {
        $user = User::find($id);

        $user->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        return response()->json([
            'message' => 'user updated',
            'user' => $user
        ]);
    }


    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json([
            'message' => 'user deleted successfully'
        ]);
    }
}
