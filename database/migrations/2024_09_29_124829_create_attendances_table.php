<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade'); // Foreign key to employees
            $table->date('attendance_date');
            $table->enum('status', ['On Time', 'Late'])->nullable(); // Menyimpan status attendance // Tanggal absensi
            $table->time('attendance_time_in'); // Waktu hadir (diambil dari shift karyawan)
            $table->time('attendance_time_out'); // Waktu keluar (diambil dari shift karyawan)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
