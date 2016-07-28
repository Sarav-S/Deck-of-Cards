@inject('block', '\App\Helpers\Common')
<?php 
$cards = [];

if (isset($record)) {
	$cards = collect($record->cards)->pluck('id')->toArray();
}
?>
<div class="form-group">
	{!! Form::label('name', 'Name', ['class' => 'col-sm-4']) !!}
	<div class="col-sm-8">
		{!! Form::text('name', null, ['class' => 'form-control', 'id' => 'name']) !!}
	</div>
</div>

@foreach($block->getCardList() as $card)
<?php 
$attributes['class'] = 'inline';
$attributes['id'] = 'card_id_'.$card->id;
if (in_array($card->id, $cards)) {
	$attributes['checked'] = "checked";
}
?>
<div class="col-sm-4 animate-me slideInUp">
    <div class="card hovercard">
        <div class="cardheader">
            <h2>{{ $card->name }}</h2>
           	<div class="btn-group mb-2" data-toggle="buttons">
  				<label class="btn btn-success {{ (isset($attributes['checked'])) ? "active" : "" }}">
  					{!! Form::checkbox('card_id[]', $card->id, false, $attributes) !!} {{ (isset($attributes['checked'])) ? "Selected" : "Select" }}
  				</label>
  			</div>
        </div>
        <div class="info">
        	<h3 class="mt-1 mb-1">{{ $card->category->name }}</h3>
        	<div class="row">
        		<div class="col-sm-3">Energy</div>
        		<div class="col-sm-9">
	            	<div class="progress">
					  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $card->energy }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $card->energy }}%;">
					    	{{ $card->energy }}%
					  	</div>
					</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-3">Attack</div>
        		<div class="col-sm-9">
	            	<div class="progress">
					  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $card->attack }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $card->attack }}%;">
					    	{{ $card->attack }}%
					  	</div>
					</div>
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-sm-3">Defend</div>
        		<div class="col-sm-9">
	            	<div class="progress">
					  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $card->defend }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $card->defend }}%;">
					    	{{ $card->defend }}%
					  	</div>
					</div>
        		</div>
        	</div>
        </div>
    </div>
</div>
<?php $attributes = []; ?>
@endforeach
<div class="clear"></div>
<div class="form-group">
	<div class="col-sm-6"></div>
	{!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}
</div>
