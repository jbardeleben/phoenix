@extends('templates.pages')

@section('pagetitle', ' - View All Articles')

@section('content')
			<div class="row">
				<div class="col-md-10">
					<div class="alert alert-danger alert-dismissible" role="alert">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<strong>WARNING: </strong>Deleting a user account CANNOT BE UNDONE. All records for that account are permanently removed.
					</div>
					<h1>Viewing All Wavlite Users</h1>
				</div>
				<div class="col-md-12">
					<hr>
				</div>
			</div><!-- row -->
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-condensed table-bordered">
						<thead>
							<th>#</th>
							<th>Name</th>
							<th>Email</th>
							<th>Registered On</th>
							<th>Updated On</th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
						@foreach($users as $user)
							<tr>
								<td>{{ $user->id }}</td>
								<td>{{ $user->name }}</td>
								<td>
									<a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
								</td>
								<td>
									{{ date('M d, Y, H:i', strtotime($user->created_at)) }}
								</td>
								<td>
									{{ date('M d, Y, H:i', strtotime($user->updated_at)) }}
								</td>
								<td>
									<a href="{{ route('users.show', $user->id) }}" class="btn btn-info btn-xs btn-block">
										View
									</a>
								</td>
								<td>
									{!! Form::open(
										['route'=>['users.destroy', $user->id], 'method'=>'DELETE']
									) !!}
										{!! Form::submit('Delete', 
											['class'=>'btn btn-warning btn-xs btn-block']) 
										!!}
									{!! Form::close() !!}
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="text-center">
						<nav><ul class="pagination">{!! $users->links(); !!}</ul></nav>
						Page {!! $users->currentPage(); !!} of {!! $users->lastPage(); !!}
					</div>
				</div><!-- col-md-12 -->
			</div><!-- row -->
@stop