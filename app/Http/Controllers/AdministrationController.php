<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

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

    function snippets()
    {
        $snippets = DB::table('snippets')->paginate(30);

        return view('admin.snippets', compact('snippets'));
    }

    function comments()
    {
        $comments = DB::table('comments')->paginate(30);

        return view('admin.comments', compact('comments'));
    }

    function communities()
    {
        $communities = DB::table('communities')->paginate(30);

        return view('admin.communities', compact('communities'));
    }

    function users()
    {
        $users = DB::table('users')->paginate(30);

        return view('admin.users', compact('users'));
    }
}
