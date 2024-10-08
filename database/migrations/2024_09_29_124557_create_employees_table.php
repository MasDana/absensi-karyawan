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
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Primary key, autogenerated
            $table->unsignedBigInteger('employee_id')->unique(); // Custom Employee ID starting from 101
            $table->string('name');
            $table->string('phone_number');
            $table->date('birthdate');
            $table->string('address');
            $table->enum('gender', ['male', 'female']);
            $table->string('email')->unique();
            $table->string('password');
            $table->foreignId('position_id')->constrained('positions')->onDelete('cascade'); // Foreign key to positions
            $table->foreignId('schedule_id')->constrained('schedules')->onDelete('cascade'); // Foreign key to shifts
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
