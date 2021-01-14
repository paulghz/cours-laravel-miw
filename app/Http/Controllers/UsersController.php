<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

class UsersController extends Controller
{
    public function index() {   

    	$users = User::orderBy('name')->paginate(20);

    	// Combien ?

    	// limit 0,10



    	return view('pages.users_list', [
    		'users' => $users
    	]);
    }

    //$users = factory(App\User::class, 3)->create();
}
