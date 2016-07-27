@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		@include('partials.errors')
		{!! Form::open(['url' => route('user-save'), 'method' => 'POST', 'class' => 'validate form-horizontal', 'files' => true]) !!}
			@include('users._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection