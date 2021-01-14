@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">{{ $serie->title }}</h1>

	<ul class="">

		@foreach($serie->seasons as $season)
				
			<li>Saison {{ $season->season_number }} ({{ count($season->episodes) }} épisodes)</li>

		@endforeach

	</ul>

@endsection