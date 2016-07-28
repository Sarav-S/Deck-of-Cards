@inject('block', '\App\Helpers\Common')

@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="row mb-2">
			<form action="{{ url('decks-comparison') }}" method="GET" class="compare-decks">
				<div class="col-sm-6">
					<h3 class="text-center mb-2">Select Deck</h3>
					<input type="text" name="deck1" id="deck1" value="{{ $deckOne }}" placeholder="Entire Deck Unique Id" class="form-control">
				</div>
				<div class="col-sm-6">
					<h3 class="text-center mb-2">Select Deck</h3>
					@if (auth()->check())
						<?php $decks = $block->getDecks() ?>
						@if (count($decks))
						{!! Form::select('deck2', $decks, $deckTwo, ['class' => 'form-control', 'id' => 'deck2']) !!}
						@else
							<input type="text" name="deck2" value="{{ $deckTwo }}" id="deck2" placeholder="Entire Deck Unique Id" class="form-control">
						@endif
					@else
					<input type="text" name="deck2" id="deck2" value="{{ $deckTwo }}" placeholder="Entire Deck Unique Id" class="form-control">
					@endif
				</div>
				<div class="col-sm-6 col-sm-offset-3 mt-2 text-center">
					<input type="submit" name="Compare" id="compare" class="btn btn-success btn-block">
				</div>
			</form>
		</div>
		<div id="response" class="mt-2">
			
		</div>
	</div>

@endsection


@section('js')
	@if ($deckOne && $deckTwo)
	<script>
		jQuery(document).ready(function(){
			$('#compare').trigger('click');
		});
	</script>
	@endif
@endsection
