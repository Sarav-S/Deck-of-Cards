@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-6 col-sm-offset-3">
		@include('partials.errors')
	{!! Form::model($record, ['url' => route('user-update', $record->id), 'method' => 'PUT', 'class' => 'validate form-horizontal', 'files' => true]) !!}
			@include('users._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection