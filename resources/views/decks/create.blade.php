@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-12">
		@include('partials.errors')
		{!! Form::open(['url' => route('my-decks.store'), 'method' => 'POST', 'class' => 'validate form-horizontal', 'files' => true]) !!}
			@include('users.decks._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection
