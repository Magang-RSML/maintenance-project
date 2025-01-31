<?php

namespace App\Http\Controllers\ITStaff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ITStaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'user_level:it_staff']);
    }

    public function index()
    {
        return view('it_staff.dashboard');
    }
}
