<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdministrationController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'can:access-admin-tasks']);
    }

    function dashboard()
    {
        return view('admin.dashboard');
    }
}
