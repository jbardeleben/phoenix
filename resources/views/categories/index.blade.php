@extends('templates.pages')

@section('pagetitle', ' - View All Categories')
@section('bannertitle', 'All Categories')

@section('content')

			<div class="row">
				<div class="col-md-8">
					<h1>Categories</h1>
					
					<table class="table">
						<thead>
							<tr>
								<th>#</th>
								<th>Name</th>
							</tr>
						</thead>
						
						<tbody>
						@foreach($categories as $category)
							<tr>
								<th>{{ $category->id }}</th>
								<td>{{  $category->name }}</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					
					<hr>
					<div class="text-center">
						<nav><ul class="pagination">{!! $categories->links(); !!}</ul></nav>
						Page {!! $categories->currentPage(); !!} of {!! $categories->lastPage(); !!}
					</div>
					
				</div><!-- col-md-8 -->
				
				<div class="col-md-3">
					<div class="well">
						<h2>New Category:</h2>
						{!! Form::open(['route'=>'categories.store']) !!}
							{{ Form::label('name', 'Name:') }}
							<p>
							{{ Form::text('name', null,
								['class'=>'form-control'])
							}}
							</p>
							<p>
							{{ Form::submit('Create New Category',
								['class'=>'btn btn-success btn-block'])
							}}
							</p>
						{!! Form::close() !!}
						
					</div><!-- well -->
				</div><!-- col-md-3 -->
				
			</div><!-- row -->

@endsection