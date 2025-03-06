<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    //     $users = DB::table('dashboard')->get();

    //    // dd($users);

        return view('backend.dashboard.index');
        
    }
}
