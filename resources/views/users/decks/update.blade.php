@extends('layouts.app')

@section('content')
<div class="container">
	<div class="col-sm-12">
		@include('partials.errors')
		{!! Form::model($record, ['url' => route('my-decks.update', $record->id), 'method' => 'PUT', 'class' => 'validate form-horizontal', 'files' => true]) !!}
			@include('users.decks._form')
		{!! Form::close() !!}
	</div>
</div>
@endsection
