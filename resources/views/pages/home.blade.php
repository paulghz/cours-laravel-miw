@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Ma page d'accueil</h1>

	<!-- <a href="#" class="px-3 py-2 font-bold rounded-full bg-blue-400 hover:bg-blue-600 text-white">Mon bouton</a> -->

	<p>
		Bonjour, je m'appelle {{ $name }}

		@if(count($likes) > 0)

			et j'aime

			@foreach($likes as $like)

				@if($loop->last) et @endif {{ $like }}@if(!$loop->last), @endif

			@endforeach

		@endif
	</p>

@endsection