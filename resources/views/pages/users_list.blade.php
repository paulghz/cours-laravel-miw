@extends('layouts.app')

@section('content')

	<h1 class="text-3xl pb-4">Utilisateurs</h1>

	<ul>
		@foreach($users as $user)
						
			<li>
				{{ $user->name }} 
				<a class="text-xs cursor-pointer hover:text-red-500" href="{{ route('user_delete', ['user_id' => $user->id]) }}">(suppr.)</a>
			</li>

		@endforeach
	</ul>

	<div class="pt-4">
		{{ $users->links() }}
	</div>

@endsection