<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function create(Request $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();
        return response()->json($user, 201);
    }

    public function delete($id)
    {
        $user = User::find($id);
        if (empty($user)) {
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'User deleted successfully'
        ], 200);
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->save();

        return response()->json($user, 200);
    }
}
