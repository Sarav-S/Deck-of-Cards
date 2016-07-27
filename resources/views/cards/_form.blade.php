@inject('block', '\App\Helpers\Common')

<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'required' => 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('category_id', 'Category', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('category_id', $block->getCategoryList() ,null, ['class' => 'form-control', 'id' => 'category_id', 'required' => 'required']) !!}
	</div>
</div>

<div class="form-group">
	{!! Form::label('energy', 'Energy', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('energy', $block->getOptions() ,null, ['class' => 'form-control', 'id' => 'energy']) !!}
	</div>
</div>


<div class="form-group">
	{!! Form::label('attack', 'Attack', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('attack', $block->getOptions() ,null, ['class' => 'form-control', 'id' => 'attack']) !!}
	</div>
</div>


<div class="form-group">
	{!! Form::label('defend', 'Defend', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::select('defend', $block->getOptions() ,null, ['class' => 'form-control', 'id' => 'defend']) !!}
	</div>
</div>

<div class="form-group">
	<div class="col-sm-6"></div>
	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
</div>