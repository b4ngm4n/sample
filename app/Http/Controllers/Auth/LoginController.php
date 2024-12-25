<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use function Laravel\Prompts\error;

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
        ], [
            'username.required' => 'Username harus diisi',
            'password.required' => 'Password harus diisi',
        ]);

        $credentials = $request->only('username', 'password');
        // Cek apakah username ada di database
        if (!User::where('username', $credentials['username'])->exists()) {
            return redirect()->back()
                ->withErrors(['username' => 'Username tidak ditemukan.'])
                ->withInput();
        }

        // Cek apakah password cocok dengan elusername yang valid
        if (!auth()->attempt($credentials)) {
            return redirect()->back()
                ->withErrors(['password' => 'Password salah.'])
                ->withInput();
        }

        // Login berhasil
        toast('Login berhasil', 'success');
        return redirect()->intended(route('dashboard'));
    }
}
