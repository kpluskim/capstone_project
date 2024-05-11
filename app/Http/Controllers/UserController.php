<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function user_get() {
        $users = User::all();
        return response()->json($users);
    }
   
    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $token = $user->createToken('auth_token')->plainTextToken;
            return response()->json([
                'user' => $user,
                'token' => $token
            ]);
        } else {
            return response()->json(['error' => 'Unauthorized Account'], 401);
        }
    }

    public function user_create(Request $request){
        $user = new User();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
    
        $user->save();


        return response()->json(['message' =>['successfully created account'], 201]);
    }

    public function user_update(Request $request){

        $user = User::find($request->id);  //validation: upon updating if id not found cannot update
        if (!$user) {
            return response()->json([
                'message'=> 'User not found',
                'code' => 404   //htttp status codes
            ]);
        }

        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->birthdate = $request->birthdate;
        $user->address = $request->address;
        $user->password = Hash::make($request->password);
    
        $user->save();
    }
}
