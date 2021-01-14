<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Serie;

class SeriesController extends Controller
{
    public function index() {

    	/*
    	$series = \DB::table('series')
    				// ->select('id', 'title')
    				->where('title', 'Breaking Bad')
    				->join('seasons', 'series.id', '=', 'seasons.serie_id')
					->orderByDesc('title')
					->get();
		*/

		$series = Serie::with('seasons.episodes')->get();

		// ->get() : collection (array)
		// ->first() : object

    	//dump and die
    	// dd($series);

    	return view('pages.series_list', [
    		'series' => $series
    	]);
    }

    public function serie($serie_id) {

    	// $serie = Serie::where('id', $serie_id)->firstOrFail();
    	$serie = Serie::findOrFail($serie_id);

//    	if(is_null($serie)) abort(404);

    	return view('pages.serie', [
    		'serie' => $serie
    	]);
    }
}
