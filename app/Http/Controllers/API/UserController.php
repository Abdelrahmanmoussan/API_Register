<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function listUsers(Request $request){
    $users = User::select([
        'id',
        'name',
        'email'
    ])
    ->orderBy('id', 'asc')
    ->get();

    return response()->json($users);

}



public function listUserID($userId)
{
    $user = User::find($userId);

    if (!$user) {
        return response()->json(['message' => 'User not found'], 404);
    }

    return response()->json($user);
}
}
