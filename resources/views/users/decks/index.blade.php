@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Decks List <a href="{{ route('my-decks.create') }}" class="btn btn-success btn-xs ml-1">Add Deck</a></h3>
		</div>
		<div class="panel-body">
			@if (count($decks))
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
							@foreach ($decks as $deck)
							<tr>
								<td>{{ $deck->id }}</td>
								<td>{{ $deck->name }}</td>
								<td>{{ $deck->created_at->format('d-m-Y') }}</td>
								<td>{{ $deck->updated_at->diffForHumans() }}</td>
								<td>
									<a href="{{ route('my-decks.edit', $deck->id) }}" class="btn btn-info btn-xs">Edit</a>
									{!! Form::open(['url' => route('my-decks.destroy', $deck->id), 'method' => 'DELETE', 'class' => 'inline']) !!}
										<input type="submit" class="btn btn-danger btn-xs" value="Delete"/>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div class="text-center">
						{!! $decks->links() !!}
					</div>
				</div>
			@else
				@include('partials.nolist')
			@endif
		</div>
	</div>
</div>
@endsection