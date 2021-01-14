@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Utilisateurs</h1>

	<ul>
		@foreach($users as $user)
						
			<li>{{ $user->name }}</li>

		@endforeach
	</ul>

	<div class="pt-4">
		{{ $users->links() }}
	</div>

@endsection