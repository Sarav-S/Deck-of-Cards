<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required', 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('email', 'Email', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('email', null, ['class' => 'form-control', 'id' => 'email', 'required' => 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('password', 'Password', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::input('password', 'password', null, ['class' => 'form-control', 'id' => 'password']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('image', 'Avatar', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::file('image') !!}
		<p class="help-block">Upload only images</p>
	</div>
</div>

<div class="form-group">
	<div class="col-sm-6"></div>
	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
</div>