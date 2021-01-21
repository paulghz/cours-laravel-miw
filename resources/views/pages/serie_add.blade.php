@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Ajout d'une série</h1>

	@if(session('success'))

		<div class="p-3 bg-green-400 rounded-md">{{ session('success') }}</div>

	@endif

	<form action="{{ route('serie_add_post') }}" method="post">

		@csrf

		<label class="block pt-4" for="title">Titre</label>
		<input class="p-2 border focus:shadow-inner" type="text" name="title" id="title" value="{{ old('title') }}">

		@if($errors->has('title'))
			<p class="font-bold text-red-500">{{ $errors->first('title') }}</p>
		@endif

		<label class="block pt-4" for="released_at">Date de sortie</label>
		<input class="p-2 border focus:shadow-inner" type="date" name="released_at" id="released_at" value="{{ old('released_at') }}">
		@if($errors->has('released_at'))
			<p class="font-bold text-red-500">{{ $errors->first('released_at') }}</p>
		@endif

		<label class="block pt-4" for="creator_name">Créateur</label>
		<input class="p-2 border focus:shadow-inner" type="text" name="creator_name" id="creator_name" value="{{ old('creator_name') }}">
		@if($errors->has('creator_name'))
			<p class="font-bold text-red-500">{{ $errors->first('creator_name') }}</p>
		@endif

		<div class="flex flex-wrap">
			@foreach(\App\Actor::get() as $actor)
				<div class="w-full lg:w-1/6">
					<input id="actor_{{$actor->id}}" type="checkbox" name="actors[]" value="{{$actor->id}}">
					<label for="actor_{{$actor->id}}">{{ $actor->name }}</label>
				</div>
			@endforeach
		</div>


		<input class="block w-auto mt-4 leading-none cursor-pointer px-3 py-2 bg-blue-500 hover:bg-blue-600 text-white rounded-full" type="submit" name="Valider">
		
	</form>

@endsection