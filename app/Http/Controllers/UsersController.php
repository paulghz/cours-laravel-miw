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

    public function delete(Request $request) {

    	$this->validate($request, [
    		'user_id' => 'required|exists:users,id',
    	]);

    	$user_id = $request->input('user_id');

    	User::findOrFail($user_id)->delete();

    	return redirect()->back();
    }

    //$users = factory(App\User::class, 3)->create();
}
