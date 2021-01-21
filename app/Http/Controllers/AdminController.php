<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
	public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        //return view('home');

        //if (Auth::check())

        //if (!Auth::user()->is_admin) abort(403); //Pas besoin, c'est fait dans le Middleware

        echo 'ADMIN';
    }
}
