<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user_level:employee']);
    }

    public function index()
    {
        return view('employee.dashboard');
    }
}
