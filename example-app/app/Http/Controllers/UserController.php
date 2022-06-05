<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    public function signUp(Request $req)
    {
        $user = new User();
      
            $user->fill($req->all());
            $user->password = Hash::make($req->password);
            $user->save();
            return response()->json([
                'mess' => 'Sign up is success'
            ]);
    }
    public function signIn(Request $req)
    {
        if (Auth::attempt([
            'name' => $req->name,
            'password' => $req->pass
        ])) {
            $user = User::where('name', $req->name)->first();
            $user->token = $user->createToken('App')->accessToken;
            return response()->json(['token' => $user->token, 'code' => 200]);
        } else {
            return response()->json(['error' => 'Nhập sai tài khoản hoặc mật khẩu', 'code' => 401]);
        }
    }
    public function checkLogin(Request $req)
    {
        return response()->json($req->user('api'));
    }
}
