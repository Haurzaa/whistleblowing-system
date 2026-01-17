<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::where('username', $request->username)->first();

        if ($admin && Hash::check($request->password, $admin->password)) {
            // ✅ Login pakai guard admin
            Auth::guard('admin')->login($admin);

            // ✅ Arahkan sesuai role
            if ($admin->role === 'it') {
                return redirect()->route('admin.it.index')->with('success', 'Selamat datang Admin IT!');
            } else {
                return redirect()->route('menu.admin')->with('success', 'Selamat datang Admin Whistleblower!');
            }
        }

        return back()->with('error', 'Username atau password salah');
    }

    public function logout()
    {
        // ✅ Logout dari guard admin
        Auth::guard('admin')->logout();

        session()->flush();
        return redirect()->route('landingpage')->with('success', 'Berhasil logout!');
    }
}
