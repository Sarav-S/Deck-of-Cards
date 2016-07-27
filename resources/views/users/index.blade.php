@extends('layouts.app')

@section('content')
<div class="container">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Users List <a href="{{ route('user-create') }}" class="btn btn-success btn-xs ml-1">Add User</a></h3>
		</div>
		<div class="panel-body">
			@if (count($users))
				<div class="table-responsive mt-2">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>ID</th>
								<th>NAME</th>
								<th>EMAIL</th>
								<th>CREATED ON</th>
								<th>LAST UPDATED</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>{{ $user->email }}</td>
								<td>{{ $user->created_at->format('d-m-Y') }}</td>
								<td>{{ $user->updated_at->diffForHumans() }}</td>
								<td>
									<a href="{{ route('user-edit', $user->id) }}" class="btn btn-info btn-xs">Edit</a>
									{!! Form::open(['url' => route('user-delete', $user->id), 'method' => 'DELETE', 'class' => 'inline']) !!}
										<input type="submit" class="btn btn-danger btn-xs" value="Delete"/>
									{!! Form::close() !!}
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>

					<div class="text-center">
						{!! $users->links() !!}
					</div>
				</div>
			@else
				@include('partials.nolist')
			@endif
		</div>
	</div>
</div>
@endsection