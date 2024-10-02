<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Position;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class RegisterController extends Controller
{

    function index()
    {
        return view("sesi/register");
    }

    function register()
    {
        $positions = Position::all(); // Mengambil semua posisi dari database
        $schedules = Schedule::all(); // Mengambil semua jadwal dari database
        return view('sesi/register', compact('positions', 'schedules')); // Mengirimkan variabel $positions dan $schedules ke view

    }

    function create(Request $request)
    {
        // Simpan data untuk flash session
        Session::flash('email', $request->email);
        Session::flash('name', $request->name);

        // Validasi request
        $request->validate([
            'employee_id' => 'required|unique:employees,employee_id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone_number' => 'nullable|string|max:15', // Anggap bahwa nomor telepon bisa kosong dan maksimal 15 karakter
            'birthdate' => 'nullable|date|before:today', // Validasi tanggal lahir agar tidak lebih dari hari ini
            'address' => 'nullable|string|max:255',
            'gender' => 'required|in:male,female,other', // Misalnya jika gender harus salah satu dari nilai ini
            'position_id' => 'required|exists:positions,id', // Validasi bahwa posisi harus ada di tabel positions
            'schedule_id' => 'required|exists:schedules,id', // Validasi bahwa jadwal harus ada di tabel schedules
            'password' => 'required|string|min:3|confirmed', // Validasi password
        ], [
            'employee_id.required' => 'ID karyawan wajib diisi',
            'employee_id.unique' => 'ID karyawan sudah digunakan',
            'name.required' => 'Nama wajib diisi',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama maksimal 255 karakter',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Silahkan masukkan email yang valid',
            'email.unique' => 'Email sudah digunakan',
            'phone_number.string' => 'Nomor telepon harus berupa teks',
            'phone_number.max' => 'Nomor telepon maksimal 15 karakter',
            'birthdate.date' => 'Tanggal lahir tidak valid',
            'birthdate.before' => 'Tanggal lahir harus sebelum hari ini',
            'address.string' => 'Alamat harus berupa teks',
            'address.max' => 'Alamat maksimal 255 karakter',
            'gender.required' => 'Jenis kelamin wajib dipilih',
            'gender.in' => 'Jenis kelamin harus salah satu dari male, female, atau other',
            'position_id.required' => 'Posisi wajib dipilih',
            'position_id.exists' => 'Posisi tidak ditemukan',
            'schedule_id.required' => 'Jadwal wajib dipilih',
            'schedule_id.exists' => 'Jadwal tidak ditemukan',
            'password.required' => 'Password wajib diisi',
            'password.string' => 'Password harus berupa teks',
            'password.min' => 'Password minimal 3 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        // Data untuk disimpan ke database
        $data = [
            'employee_id' => $request->employee_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'birthdate' => $request->birthdate,
            'address' => $request->address,
            'gender' => $request->gender,
            'position_id' => $request->position_id,
            'schedule_id' => $request->schedule_id,
            'password' => Hash::make($request->password)
        ];

        // Simpan data karyawan ke dalam database
        Employee::create($data);

        // Redirect ke halaman sesi
        return redirect('sesi');
    }
}
