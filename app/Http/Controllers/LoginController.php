<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function login(LoginRequest $request){
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if(Auth::attempt($credentials))
        {
            if($request->email =='admin@test.com' && $request->password == 'admin123')
            {
                return redirect('/admin/dashboard');
            }
            else{
                return redirect('/user/dashboard');
            }
        }
        else{
            return Redirect::back()->withErrors(['message' => 'Invalid Credentials']);
        }
    }
}
