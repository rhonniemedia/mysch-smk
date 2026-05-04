<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Coba login sebagai admin (via hash karena kolom terenkripsi)
        $admin = User::findForLogin($request->username);
        if ($admin && Hash::check($request->password, $admin->password)) {
            Auth::guard('web')->login($admin, $request->boolean('remember'));
            $request->session()->regenerate();
            return redirect()->route('admin.dashboard');
        }

        // Coba login sebagai pelajar
        // PelajarUserProvider::retrieveByCredentials() mencari berdasarkan key 'username'
        $credentialsPelajar = ['username' => $request->username, 'password' => $request->password];

        if (Auth::guard('pelajar')->attempt($credentialsPelajar, $request->boolean('remember'))) {
            $request->session()->regenerate();
            return redirect()->route('student.dashboard');
        }

        return back()->withErrors([
            'username' => 'Username atau password salah.',
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        Auth::guard('pelajar')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
