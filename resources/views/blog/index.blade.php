@extends('templates.pages')

@section('pagetitle', ' - Ocean Pure Water System')
@section('bannertitle', 'News &amp; Information')
@section('leader')
What you need to know about water at home and abroad
@endsection

@section('content')
			<div class="row">
				<div class="col-md-8">
					<!--
					<h1>News &amp; Information</h1>
					<p class="space">
						What you need to know about water at home and abroad
					</p>
					-->
					
					@foreach($posts as $post)
					<div class="post">
						<h3 class="h3-main">
							<a href="{{ route('blog.single', $post->slug) }}" class="h3-a">
								{{ $post->title }}
							</a>
							<br><br>
							<small>
								<span class="glyphicon glyphicon-calendar"></span>: 
								{!! date('F j, Y', strtotime($post->created_at)) !!}&nbsp;&nbsp;|&nbsp;&nbsp;
								<span class="glyphicon glyphicon-bookmark"></span>: 
								{{ $post->category->name }}
							</small>
							<br>
							<small>
							<span class="glyphicon glyphicon-tags"></span>: 
							@foreach($post->tags as $tag)
								<a href="{{ route('tags.show', $tag->id) }}"
								   class="label label-grey-sm">{{ $tag->name }}</a>
							@endforeach
							</small>
						</h3>
						<p>
							
						</p>
						<p>
							{{ str_limit(strip_tags($post->body, 250)) }}
							{{ strlen(strip_tags($post->body)) > 250 ? ' [...]' : '' }}
						</p>
						<a href="{{ route('blog.single', $post->slug) }}" 
						   class="btn btn-primary btn-sm">Read More &raquo;</a>
					</div><!-- post -->
					<p class="helper-hr-4"></p>
					@endforeach
				</div><!-- col-md-8 -->

				<!-- SIDEBAR CONTENT -->
				<p class="helper-br-3"></p>
				<div class="col-md-3 col-md-offset-1 sidebar">
@include('templates.sections.blog-sidebar')
				</div><!-- col-md-3 col-md-offset-1 sidebar -->
			</div><!-- row -->
			
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<nav><ul class="pagination">{!! $posts->links(); !!}</ul></nav>
						Page {!! $posts->currentPage(); !!} of {!! $posts->lastPage(); !!}
					</div>
				</div><!-- col-md-12 -->
			</div><!-- row -->
@stop