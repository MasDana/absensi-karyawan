<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class attendanceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('attendance')->insert([
            'uid' => '111',
            'emp_id' => '111',
            'state' => '1',
            'type' => '1',
            'attendance_time' => '22:22:22',
            'attendance_date' => '2024-02-22',
            'status' => '1'

        ]);
    }
}
