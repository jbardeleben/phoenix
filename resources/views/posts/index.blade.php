@extends('templates.pages')

@section('pagetitle', ' - View All Articles')
@section('bannertitle', 'All Articles')

@section('content')
			<div class="row">
				<div class="col-md-10">
					<h1>All Available Articles</h1>
				</div>
				<div class="col-md-2">
					<a href="{{ route('posts.create') }}" 
					   class="btn btn-primary btn-block btn-h1-spacing">
						Create a New Article &raquo;
					</a>
				</div>
				<div class="col-md-12">
					<hr>
				</div><!-- col-md-12 -->
			</div><!-- row -->
			
			<div class="row">
				<div class="col-md-12">
					<table class="table table-hover table-condensed">
						<thead>
							<th>#</th>
							<th>Title</th>
							<th>Body</th>
							<th>Published</th>
							<th></th>
							<th></th>
						</thead>
						<tbody>
						@foreach($posts as $post)
							<tr>
								<th>{{ $post->id }}</th>
								<td>{!! $post->title !!}</td>
								<td>
									{{ str_limit(strip_tags($post->body, 100)) }}
									{{ strlen(strip_tags($post->body)) > 100 ? ' [...]' : '' }}
								</td>
								<td>
									{{ date('M d, Y, H:i', strtotime($post->created_at)) }}
								</td>
								<td>
									<a href="{{route('posts.show', $post->id)}}" 
									   class="btn btn-primary btn-sm">View</a> 
								</td>
								<td>
									<a href="{{route('posts.edit', $post->id)}}" 
									   class="btn btn-primary btn-sm">Edit</a>
								</td>
							</tr>
						@endforeach
						</tbody>
					</table>
					<div class="text-center">
						<nav><ul class="pagination">{!! $posts->links(); !!}</ul></nav>
						Page {!! $posts->currentPage(); !!} of {!! $posts->lastPage(); !!}
					</div>
				</div><!-- col-md-12 -->
			</div><!-- row -->
@stop