@extends('templates.pages')

@section('pagetitle')
- Viewing {{$post->title}}
@stop
<a name="#top"></a>
@section('bannertitle')
{{ $post->title }}
@stop
@section('leader')
{!! $post->user->name !!}, 
{{ date('F d, Y', strtotime($post->created_at)) }}
@stop

@section('content')

			<div class="row">
				<div class="col-md-8">
					<p class="helper-hr-2-bt"></p>
					<div style="font-size: 1.3em">
						{!! $post->body !!}
					</div>
					<p class="helper-hr-2-bb"></p>
					<p>
						<strong>
							Author: <em>{{ $post->user->name }}</em>
						</strong> | 
						<a href="mailto:{{ $post->user->email }}">{{ $post->user->email }}</a>
					</p>
					<p>
						<strong>
							Category: <em>{{ $post->category->name }}</em>
						</strong>
					</p>
					<p class="tags">
						<strong>
							Tags:
						</strong><br>
						@foreach($post->tags as $tag)
							<a href="{{ route('tags.show', $tag->id) }}" class="label label-grey">{{ $tag->name }}</a>
						@endforeach
					</p>
					<p>
						<strong>Published on: </strong>{{ date('F j, Y', strtotime($post->created_at)) }}
					</p>
					<p>
						<strong>Permalink: </strong><br>
						<a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>
					</p>
					<br><br>
					<div class="backend-comments">
						<h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
						
						<table class="table table-condensed table-hover">
							<thead>
								<tr>
									<th class="comments-th-l">Name</th>
									<th class="comments-th-c">Email</th>
									<th class="comments-th-r">Comment</th>
									<th colspan="2"></th>
								</tr>
							</thead>

							<tbody>
								@foreach($post->comments as $comment)
								<tr>
									<td class="comments-sm">{{ $comment->name }}</td>
									<td class="comments-sm">{{ $comment->email }}</td>
									<td class="comments-sm">{{ $comment->comment }}</td>
									<td>
										<a href="{{ route('comments.edit', $comment->id) }}" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-pencil"></span>
										</a>
									</td>
									<td>
										<a href="{{ route('comments.delete', $comment->id) }}" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-trash"></span>
										</a>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table>
					</div><!-- backend-comments -->
					<br><br>
					<a href="#top" class="btn btn-default" role="button" 
					   aria-label="Back to top">Back To Top</a>
					&nbsp;&nbsp;
					<a href="{{ route('blog.index') }}" class="btn btn-default" role="button" 
					   aria-label="View All Posts">View All Posts</a>
					<!-- POST END -->
					

					<!-- AUTHENTICATED POST CONTROL PANEL -->					
					<!-- use a better check for authentication if possible, this is just to test -->
					@if (Auth::check())
					<hr>
					<p>AUTHOR CONTROL PANEL</p>
					<div class="well btn-toolbar">
						<div class="col-md-9">
							<div class="btn-group btn-group-justified" role="group" aria-label="Toolbar">
								<!-- delete button is a submit, so it cannot be in this group... -->
								{!! Html::linkRoute('posts.edit', 'EDIT', [$post->id], ['class' => 'btn btn-primary', 'role' => 'button']) !!}
								{!! Html::linkRoute('posts.create', 'NEW POST', [], ['class'=>'btn btn-primary', 'role'=>'button']) !!}
								{!! Html::linkRoute('blog.index', 'VIEW ALL', [], ['class'=>'btn btn-primary', 'role'=>'button']) !!}
								{!! Html::linkRoute('posts.index', 'VIEW (ADMIN)', [], ['class'=>'btn btn-primary', 'role'=>'button']) !!}
							</div><!-- btn-group -->
						</div><!-- col-md-9 -->
						<div class="col-md-3">
							<div class="btn-group btn-group-justified" role="group" aria-label="Toolbar">
								{!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
									{!! Form::submit('DELETE', ['class'=>'btn btn-default btn-block']) !!}
								{!! Form::close() !!}
							</div><!-- btn-group -->
						</div><!-- col-md-3 -->
					</div><!-- well -->
					@endif
				</div><!-- col-md-6 col-md-8 -->

				<!--<br><br>  necessary for smaller screens. no need to media query this... -->
				
				<!-- SIDEBAR CONTENT -->
				<div class="col-md-offset-1 col-md-3 well">
					<h3>Post Details</h3>
					<div class="well">
						<div class="row">
							<dl class="dl-horizontal">
								<label>Author: </label>
								<p>
									{{ $post->user->name }}<br>
									<a href="mailto:{{ $post->user->email }}">
										{{ $post->user->email }}
									</a>
								</p>
								<label>Created: </label>
								<p>{{ date('M d, Y, H:i', strtotime($post->created_at)) }}</p>
								<label>Last Updated: </label>
								<p>{{ date('M d, Y, H:i', strtotime($post->updated_at)) }}</p>
								<label>Category: </label>
								<p>{{ $post->category->name }}</p>
								<label>Tags: </label>
								<p class="tags">
								@foreach($post->tags as $tag)
									<a href="{{ route('tags.show', $tag->id) }}" 
									   class="label label-grey-sm">{{ $tag->name }}</a>
								@endforeach
								</p>
								<label>URL: </label>
								<p>
									<a href="{{ route('blog.single', $post->slug) }}">
										{{ route('blog.single', $post->slug) }}
									</a>
								</p>
							</dl>
						</div><!-- row -->
						
						<!-- IF USER IS LOGGED IN (use Auth::check() here) -->
						@if (Auth::check())
						
						<hr>
						<div class="row">
							<div class="col-sm-12">
								<div class="btn-group btn-group-justified" role="group" aria-label="Edit Buttons">
									{!! Html::linkRoute('posts.edit', 'EDIT', [$post->id], 
										[
											'class'=>'btn btn-primary btn-sm btn-block btn-lg',
											'role' =>'button'
										])
									!!}
									{!! Html::linkRoute('posts.create', 'COMPOSE', [], 
										[
											'class'=>'btn btn-primary btn-sm',
											'role' =>'button'
										])
									!!}
								</div><!-- btn-group -->
							</div><!-- col-sm-12 -->
						</div><!-- row -->
						<div class="row">
						<br>
							<div class="col-sm-12">
								{!! Html::linkRoute('posts.index', 'VIEW ALL', [], 
									[
										'class'=>'btn btn-primary btn-sm btn-block',
										'role' =>'button'
									])
								!!}
							</div><!-- col-sm-12 -->
						</div><!-- row -->
						
						<hr>
						<div class="row">
							<div class="col-sm-12">
								{!! Form::open(
									['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']
								) !!}
									{!! Form::submit('DELETE', 
										['class'=>'btn btn-default btn-sm btn-block']) 
									!!}
								{!! Form::close() !!}
							</div><!-- col-sm-12 -->
						</div><!-- row -->
						@endif

					</div><!-- (inner) well -->
				</div><!-- col-md-offset-1 col-md-3 well -->
			</div><!-- row -->
@stop