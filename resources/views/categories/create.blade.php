@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		@include('partials.errors')
		{!! Form::open(['url' => route('categories.store'), 'method' => 'POST', 'class' => 'validate form-horizontal']) !!}
			@include('categories._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection