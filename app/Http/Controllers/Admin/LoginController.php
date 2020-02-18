<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\LoginRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function showLogin(){
        return view('admin.login.index');
    }

    public function handleLogin (LoginRequest $request) {
        //Check use name exits
        $user = User::where('name',$request->username)->with('role')->first();
        if (empty($user)){
            return redirect()->back()->with('error','User Name invalid');
        }
        //Check password
        if (Hash::check($request->password,$user->password)){
            return redirect()->back()->with('error','Password invalid');
        }
        session(['user'=> $user]);
        return redirect()->route('admin.dashboard')->with('success','Login successful');
    }

    public function logout() {
        return redirect()->route('admin.showLogin');
    }



}
