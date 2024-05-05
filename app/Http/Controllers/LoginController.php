<?php

namespace App\Http\Controllers;

use App\Http\Requests\SigninRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function render()
    {
        return view('login');
    }

    public function signin(SigninRequest $request)
    {
        $auth = Auth::attempt($request->validated(), true);

        if ($auth) {
            return redirect()->route(auth()->user()->role === 'admin' ? 'dashboard' : 'home');
        } else {
            notify()->error('Password anda salah, coba lagi!');
            return back();
        }
    }
}
