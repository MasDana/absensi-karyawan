<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class SessionController extends Controller
{
    //untuk menampilkan form
    function index()
    {
        return view("sesi/index");
    }

    //authentikasi email pass
    function login(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        $request->validate([
            'email' => 'required',
            'password' => 'required'
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
            return redirect('sesi')->withErrors('Username dan/atau password yang anda masukkan salah');
        }
    }

    function logout()
    {
        Auth::logout();

        return redirect('sesi');
    }

    function register()
    {
        return view('sesi/register');
    }

    function create(Request $request)
    {
        FacadesSession::flash('email', $request->email);
        FacadesSession::flash('name', $request->name);

        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:3',
            'name' => 'required'
        ], [
            'name.required' => 'nama wajib diisi',
            'email.required' => 'email wajib diisi',
            'email.email' => 'silahkan masukkan email yang vaild',
            'email.unique' => 'email sudah digunakan',
            'password.required' => 'password wajib diisi',
            'password.min' => 'password minimal 3 karakter'

        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::attempt($infologin)) {
            // kalau auth sukses
            return redirect('/sesi');
        } else {
            // kalau auth gagal
            return redirect('register')->withErrors('Register gagal, silahkan coba lagi');
        }
    }
}
