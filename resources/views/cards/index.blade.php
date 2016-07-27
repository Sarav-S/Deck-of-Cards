@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Card List<a href="{{ route('cards.create') }}" class="btn btn-success btn-xs ml-1">Add Card</a></h3>
		</div>
		<div class="panel-body">
			@if (count($cards))
				<div class="table-responsive mt-2">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>CREATED ON</th>
								<th>LAST UPDATED</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($cards as $card)
							<tr>
								<td>{{ $card->id }}</td>
								<td>{{ $card->name }}</td>
								<td>{{ $card->created_at->format('d-m-Y') }}</td>
								<td>{{ $card->updated_at->diffForHumans() }}</td>
								<td>
									<a href="{{ route('cards.edit', $card->id) }}" class="btn btn-info btn-xs">Edit</a>
									{!! Form::open(['url' => route('cards.destroy', $card->id), 'method' => 'DELETE', 'class' => 'inline']) !!}
										<input type="submit" class="btn btn-danger btn-xs" value="Delete"/>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{!! $cards->links() !!}
					</div>
				</div>
			@else
				@include('partials.nolist')
			@endif
		</div>
	</div>
</div>
@endsection