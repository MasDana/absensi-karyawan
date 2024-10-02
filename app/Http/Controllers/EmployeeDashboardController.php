<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class employeeDashboardController extends Controller
{
    function index()
    {
        return view("sesi/employeeDashboard");
    }
}
