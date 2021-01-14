@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Séries</h1>

	@foreach($series as $serie)

		<h2><a class="hover:text-blue-600" href="{{ route('serie', ['serie_id' => $serie->id]) }}">{{ $serie->title }}</a></h2>

		<ul class="pl-4">

			@foreach($serie->seasons as $season)
					
				<li>Saison {{ $season->season_number }} ({{ count($season->episodes) }} épisodes)</li>

			@endforeach

		</ul>

	@endforeach

@endsection