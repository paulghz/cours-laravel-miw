<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Message;

class MessagesController extends Controller
{
    public function __construct() {
    	$this->middleware('auth');
    }

    public function users_list() {
    	$users = User::where('id', '!=', Auth::id())->get();

    	return view('users_list', ['users' => $users]);
    }

    public function conversation($to_id) {

    	$user_to = User::findOrFail($to_id);
    	if($to_id == Auth::id()) abort(404);

    	$messages = Message::where(function($query) use($to_id) {
    		$query->where('from_id', Auth::id())
    			  ->where('to_id', $to_id)
    	})
    	->orWhere(function($query) use($to_id) {
    		$query->where('from_id', $to_id)
				  ->where('to_id', Auth::id())
    	})
    	->orderBy('created_at');
    	->get();

    	// Autre méthode :
    	// $messages = Message::whereIn('from_id', [Auth::id(), $to_id])
					// 	   ->whereIn('to_id', [$to_id, Auth::id()])
    	// 				   ->get();

    	return view('conversation', ['messages' => $messages, 'to_id' => $to_id]);


    }

    public function postMessage(Request $request) {

    	$this->validate($request, [
    		'content' => 'required',
    		'to_id' => 'required|exists:users,id'
    	]);

    	if($request->input('to_id') == Auth::id()) return redirect()->back();

		$message = Message::create([
			'content' => $request->input('content'),
			'to_id' => $request->input('to_id'),
			'from_id' => Auth::id(),
		]);

		return redirect()->back();

    	//$user_to = User::findOrFail($request->input('to_id'));

    	//Auth::id();
    }
}
