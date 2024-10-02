<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class employeesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('employees')->insert([
            'name' => 'dana',
            'position' => 'position',
            'email' => 'bebas@gmail.com',
            'pin_code' => '1234444',
            'permissions' => 'bebas'

        ]);
    }
}
