<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-6"></div>
	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
</div>