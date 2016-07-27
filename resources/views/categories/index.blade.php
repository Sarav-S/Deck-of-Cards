@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Category List<a href="{{ route('categories.create') }}" class="btn btn-success btn-xs ml-1">Add Category</a></h3>
		</div>
		<div class="panel-body">
			@if (count($categories))
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
							@foreach ($categories as $category)
							<tr>
								<td>{{ $category->id }}</td>
								<td>{{ $category->name }}</td>
								<td>{{ $category->created_at->format('d-m-Y') }}</td>
								<td>{{ $category->updated_at->diffForHumans() }}</td>
								<td>
									<a href="{{ route('categories.edit', $category->id) }}" class="btn btn-info btn-xs">Edit</a>
									{!! Form::open(['url' => route('categories.destroy', $category->id), 'method' => 'DELETE', 'class' => 'inline']) !!}
										<input type="submit" class="btn btn-danger btn-xs" value="Delete"/>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<div class="text-center">
						{!! $categories->links() !!}
					</div>
				</div>
			@else
				@include('partials.nolist')
			@endif
		</div>
	</div>
</div>
@endsection