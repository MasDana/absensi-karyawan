<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Employee extends Authenticatable
{
    use Notifiable; // Untuk menggunakan fitur pemberitahuan (opsional)

    // Tabel yang digunakan oleh model ini
    protected $table = 'employees';

    // Kolom yang dapat diisi (fillable)
    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'password',
        'phone_number',
        'birthdate',
        'address',
        'gender',
        'position_id',
        'schedule_id'
    ];

    // Kolom yang disembunyikan (misalnya password)
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Metode untuk hashing password (opsional, bisa juga menggunakan mutator default Laravel)

}
