<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{

    function index()
    {

        return view("sesi/index");
    }

    function login(Request $request)
    {
        $employee = Employee::where('email', $request->email)->first();
        Session::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:3'
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($infologin)) {
            // kalau auth sukses
            return redirect('/dashboard');
        } else {
            // kalau auth gagal 
            return redirect('sesi')->withErrors(['default' => 'Username dan/atau password yang anda masukkan salah']);
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect('sesi');
    }
}
