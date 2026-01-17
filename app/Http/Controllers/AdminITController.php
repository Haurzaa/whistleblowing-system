<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminITController extends Controller
{
    public function index()
    {
        $admins = Admin::where('role', 'whistleblower')->get();
        return view('admin_it.index', compact('admins'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:50|unique:admins',
            'password' => 'required|string|min:8',
        ],
        [
            'username.required' => 'Username wajib diisi.',
            'username.unique' => 'Username sudah terdaftar, silakan gunakan username lain.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 8 karakter.',
        ]);

        Admin::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'whistleblower',
        ]);

        return back()->with('success', 'Akun Admin Whistleblowing berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();

        return back()->with('success', 'Akun Admin Whistleblower berhasil dihapus.');
    }
}

