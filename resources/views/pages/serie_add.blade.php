@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Ajout d'une série</h1>

	<form action="{{ route('serie_add_post') }}" method="post">

		<input class="leading-none cursor-pointer px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full" type="submit" name="Valider">
		
	</form>

	

@endsection