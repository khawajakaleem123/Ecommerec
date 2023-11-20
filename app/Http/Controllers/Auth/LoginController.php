<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;


class LoginController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->with('fail', 'Invalid credentails');
        }
        if (!Auth::attempt(['email' => $request->input("email"), 'password' => $request->input("password")])) {
            return back()->with('fail', 'Invalid credentials');
        }
        
        $request->session()->regenerate();
        $user = Auth::user();
        
        return redirect()->intended(RouteServiceProvider::HOME);
    
    }

    public function logout()
    {
        $auth_user = Auth::user();
        auth()->logout();
        return redirect('/');
    }
}
