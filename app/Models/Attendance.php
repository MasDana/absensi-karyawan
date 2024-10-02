<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{

    protected $table = 'attendance';


    public function employee()
    {
        return $this->belongsTo(Employee::class, 'emp_id');
    }
}
