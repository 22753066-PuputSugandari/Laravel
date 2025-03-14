<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class DashboardController extends Controller
{
    public function index()
    {
        // Menggunakan Query Builder untuk mengambil data dari database
        $users = DB::table('users')->paginate(2);
        $students = DB::table('students')->paginate(5);
        $teachers = DB::table('techer')->paginate(5);
        $mapels= DB::table('mapel')->paginate(2);

        return view('backend.dashboard.index', compact('users', 'students', 'teachers', 'mapels'));
    }
}
