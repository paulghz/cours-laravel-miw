<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {

    	return view('pages.home', [
	    	'name' => 'Paul',
	    	'likes' => [
	    		'ma fille et ma femme',
	    		'les séries',
	    		'la playstation',
	    		'pour l\'instant, mes élèves MIW'
	    	]
	    ]);
    }

    public function hello($name) {

    	return view('pages.hello', [
	    	'name' => $name
	    ]);
    }

    // if (!session()->has('currency')) session(['currency' => 'usd']);
    
    // Store a piece of data in the session...
    //session(['currency' => 'eur']);
}
