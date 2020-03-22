<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function admin()
    {
        return view('home.admin');
    }
 
    public function staff()
    {
        return view('home.staff');
    }
 
    public function kurir()
    {
        return view('home.kurir');
    }
}
