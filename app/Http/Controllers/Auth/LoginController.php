<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login()
    {
        return view('auth.page.login');
    }

    public function storeLogin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (auth()->attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }

        if (!auth()->attempt(['username' => $credentials['username'], 'password' => ' dummy'])) {
            session()->flash('error', 'Username salah');
        }

        if (!auth()->attempt(['username' => ' dummy', 'password' => $credentials['password']])) {
            session()->flash('error', 'Password salah');
        }

        return redirect()->back()->withErrors(['error' => 'Username atau Password salah'])->withInput();
    }
}
