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



    public function test_join() {

    	//Ajouter un select() pour préciser les colonnes à récupérer et éviter les écrasements
    	DB::table('shops')->join('cities', 'shops.city_id', '=', 'cities.id')->where('cities.name', 'LIKE', '...%')->get();

    	//\App\Shops::join('cities', 'shops.city_id', '=', 'cities.id')->where('cities.name', 'LIKE', '...%')->get();

    	$city = \App\City::where('name', 'LIKE', '...%')->first();
    	// $city->shops

    	$search_string = '...';
    	\App\Shop::whereHas('city', function($query) use($search_string) {

    		$query->where('name', 'LIKE', $search_string.'%');

    	})->get();

    	//\App\Shop::has('city')->get();  //les shops ayant une ville (aucun intérêt si votre relation n'est pas nullable)
    	//\App\City::has('shops')->get(); //les villes qui ont des shops

    }
}
