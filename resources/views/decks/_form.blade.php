@inject('block', '\App\Helpers\Common')
<?php 
$cards = [];

if (isset($record)) {
	$cards = collect($record->cards)->pluck('card_id')->toArray();
}
?>
<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
	</div>
</div>

@foreach($block->getCardList() as $key => $card)
<?php 
$attributes['class'] = 'inline';
$attributes['id'] = 'card_id_'.$key;
if (in_array($key, $cards)) {
	$attributes['checked'] = "checked";
}
?>
<div class="form-group checkboxes">
	{!! Form::checkbox('card_id[]', $key, false, $attributes) !!}
	{!! Form::label('card_id_'.$key, $card, ['class' => 'inline']) !!}
</div>
<?php $attributes = []; ?>
@endforeach

<div class="form-group">
	<div class="col-sm-6"></div>
	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
</div>