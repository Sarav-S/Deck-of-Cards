@extends('layouts.app')

@section('content')
<?php $cardOne = collect($deck->cards); ?>
<div class="container">
	<h3 class="text-center">Stats</h3>
	<div class="col-sm-3">Energy</div>
	<div class="col-sm-9">
		<div class="progress">
			<?php $energy = collect($cardOne)->sum('energy') ?>
			<?php $percentageEnergy = $energy  * 100/ 2100; ?>
		  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $energy }}" aria-valuemin="0" aria-valuemax="2100" style="width: {{ ($percentageEnergy) }}%;">
		    	{{ $energy }}/2100
		  	</div>
		</div>
	</div>
	<div class="col-sm-3">Attack</div>
	<div class="col-sm-9">
		<div class="progress">
			<?php $attack = collect($cardOne)->sum('attack') ?>
			<?php $percentageAttack = $attack  * 100/ 2100; ?>
		  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $attack }}" aria-valuemin="0" aria-valuemax="2100" style="width: {{ ($percentageAttack) }}%;">
		    	{{ $attack }}/2100
		  	</div>
		</div>
	</div>
	<div class="col-sm-3">Defend</div>
	<div class="col-sm-9">
		<div class="progress">
			<?php $defend = collect($cardOne)->sum('defend') ?>
			<?php $percentageDefend = $defend * 100/ 2100; ?>
		  	<div class="progress-bar" role="progressbar" aria-valuenow="{{ $defend }}" aria-valuemin="0" aria-valuemax="2100" style="width: {{ ($percentageDefend) }}%;">
		    	{{ $defend }}/2100
		  	</div>
		</div>
	</div>
	<h3 class="text-center">Cards</h3>
	<div class="row">
		@foreach($cardOne as $card)
			<div class="col-sm-4 animate-me slideInUp">
		        <div class="card hovercard">
		            <div class="cardheader">
		                <h2>{{ $card->name }}</h2>
		            </div>
		            <div class="info">
		            	<p>Category {{ $card->category->name }}</p>
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
		@endforeach
	</div>
</div>
@endsection