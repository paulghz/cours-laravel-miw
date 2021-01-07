<nav class="flex justify-between p-8 border-b">
		
	<h3><a href="{{ route('home') }}">Laravel</a></h3>
	<div class="flex">
		<a class="pr-4 hover:text-blue-600" href="{{ route('hello', ['name' => 'Paul']) }}">Hello</a>
		<a class="pr-4 hover:text-blue-600" href="#">Lien 2</a>
	</div>

</nav>