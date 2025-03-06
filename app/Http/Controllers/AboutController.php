<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function index() {
        return view('about'); 
    }
}
