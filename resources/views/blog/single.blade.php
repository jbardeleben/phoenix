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
        <strong>Author: <em>{{ $post->user->name }}</em></strong> | 
        <a href="mailto:{{ $post->user->email }}">{{ $post->user->email }}</a>
      </p>
      <p><strong>Category: <em>{{ $post->category->name }}</em></strong></p>
      <p class="tags">
        <strong>Tags:</strong><br>
        @foreach($post->tags as $tag)
          <a href="{{ route('tags.show', $tag->id) }}" class="label label-grey">{{ $tag->name }}</a>
        @endforeach
      </p>
      <p><strong>Published on: </strong>{{ date('F j, Y H:m', strtotime($post->created_at)) }}</p>
      @if ( $post->created_at != $post->updated_at)
      <p><strong>Updated on: </strong>{{ date('F j, Y H:m', strtotime($post->updated_at)) }}</p>
      @endif
      <p>
        <strong>Permalink: </strong><br>
        <a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a>
      </p>
      <br><br>
      <a href="#top" class="btn btn-default" role="button" aria-label="Back to top">Back To Top</a>
      &nbsp;&nbsp;
      <a href="{{ route('blog.index') }}" class="btn btn-default" role="button" aria-label="View All Posts">View All Posts</a>
      <!-- POST END -->
      <hr>

      <!-- COMMENTS SECTION ======================================= -->
      <div class="row">
        <div id="comment-form" class="col-md-12 well">
          <div class="comment-header">
            <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments()->count() }} Comments</h3>
          </div><!-- comment-header -->

          <!-- comments  container -->
          @foreach($post->comments as $comment)
          <div class="well comment">
            <div class="author-info">
              <img src="{{ 'https://www.gravatar.com/avatar/'. md5(strtolower(trim($comment->email))) .'?s=50&d=monsterid' }}" class="author-img">
              <div class="author-name">
                <h4>{{ $comment->name }}</h4>
                <p class="author-time">{{ date('F d, Y - H:m:s', strtotime($comment->created_at)) }}</p>
              </div><!-- author-name -->
            </div><!-- author-info -->
            <!-- comment -->
            <div class="comment-content">
              {!! $comment->comment !!}
            </div><!-- comment-content -->
          </div><!-- comment -->
          @endforeach

          <!-- comments form -->
          {{ Form::open(['route'=>['comments.store', $post->id], 'method'=>'POST', 'class'=>'comment-form']) }}
          <p>* <em>All Fields Required</em></p>
          <div class="row">
            <div class="col-md-6">
              {{ Form::label('name', 'Name:') }}
              {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div><!-- col-md-6 -->
            <div class="col-md-6">
              {{ Form::label('email', 'Email:') }}
              {{ Form::text('email', null, ['class' => 'form-control']) }}
            </div><!-- col-md-6 -->
          </div><!-- row -->
          <div class="row">
            <div class="col-md-12">
              {{ Form::label('comment', 'Comment:') }}
              <br>
              {{ Form::textarea('comment', null, ['class' => 'form-control', 'rows'  => '5']) }}
              {{ Form::submit('Add Comment', ['class' => 'btn btn-primary', 'style' => 'margin-top: 10px;']) }}
            </div><!-- col-md-12 -->
          </div><!-- row -->
          {{ Form::close() }}
        </div><!-- #comment-form -->
        <div class="col-md-12">
          <br><br>
          <a href="#top" class="btn btn-default" role="button" aria-label="Back to top">Back To Top</a>
          &nbsp;&nbsp;
          <a href="{{ route('blog.index') }}" class="btn btn-default" role="button" aria-label="View All Posts">View All Posts</a>
        </div><!-- col-md-12 -->
      </div><!-- row (comments form) -->

      <!-- AUTHENTICATED POST CONTROL PANEL ========================== -->
      <!-- use a better check for authentication, this is just to test -->
      @if (Auth::check())
      <hr>
      <p>AUTHOR CONTROL PANEL</p>
      <div class="well btn-toolbar">
        <div class="col-md-9">
          <div class="btn-group btn-group-justified" role="group" aria-label="Toolbar">
          <!-- delete button is a submit, so it cannot be in this group... -->
          {!! Html::linkRoute('posts.edit', 'EDIT', [$post->id], ['class'=>'btn btn-primary btn-sm', 'role' =>'button']) !!}
          {!! Html::linkRoute('posts.create', 'NEW', [], ['class'=>'btn btn-primary btn-sm', 'role' =>'button']) !!}
          {!! Html::linkRoute('blog.index', 'VIEW ALL', [], ['class'=>'btn btn-primary btn-sm', 'role' =>'button']) !!}
          {!! Html::linkRoute('posts.index', 'VIEW ALL *', [], ['class'=>'btn btn-primary', 'role' =>'button']) !!}
          </div><!-- btn-group -->
        </div><!-- col-md-9 -->
        <div class="col-md-3">
          <div class="btn-group btn-group-justified" role="group" aria-label="Toolbar">
            {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
              {!! Form::submit('DELETE', ['class'=>'btn btn-default btn-sm btn-block']) !!}
            {!! Form::close() !!}
          </div><!-- btn-group -->
        </div><!-- col-md-3 -->
      </div><!-- well -->
      @endif
    </div><!-- col-md-6 col-md-8 -->

    <!--<br><br>  necessary for smaller screens. no need to media query this... -->

    <!-- SIDEBAR CONTENT ======================================= -->
    <div id="sidebar" class="col-md-offset-1 col-md-3 well sidebar">
      <h3>Post Details</h3>
      <hr>
      <div class="col-sm-12">
        <div class="row">
          <dl class="dl-horizontal">
            <label>Author: </label>
            <p>
              {{ $post->user->name }}<br>
              <a href="mailto:{{ $post->user->email }}">{{ $post->user->email }}</a>
            </p>
								
            <label>Created: </label>
            <p>{{ date('M d, Y, H:i', strtotime($post->created_at)) }}</p>
								
            @if ( $post->created_at != $post->updated_at)
            <label>Last Updated: </label>
            <p>{{ date('M d, Y, H:i', strtotime($post->updated_at)) }}</p>
            @endif
								
            <label>Category: </label>
            <p>{{ $post->category->name }}</p>

            <label>Tags: </label>
            <p class="tags">
            @foreach($post->tags as $tag)
              <a href="{{ route('tags.show', $tag->id) }}" class="label label-grey-sm">{{ $tag->name }}</a>
            @endforeach
            </p>

            <label>URL: </label>
            <p><a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>
          </dl>
          <p>
            <a href="{{ route('blog.index') }}" class="btn btn-sm btn-default btn-block" title="View All Posts">View All Posts</a>
          </p>
        </div><!-- row -->
        
        @if (Auth::check())
        <hr>
        <!-- Authenticated Post Control Panel for Sidebar -->
        <div class="row">
          <div class="col-sm-12">
            {!! Html::linkRoute('posts.edit', 'EDIT', [$post->id], [ 'class'=>'btn btn-primary btn-block btn-sm', 'role' =>'button' ]) !!}
          </div><!-- col-sm-12 -->
        </div><!-- row -->
        <br>

        <div class="row">
          <div class="col-sm-12">
            <div class="btn-group btn-group-justified" role="group" aria-label="Edit Buttons">
              {!! Html::linkRoute('posts.index', 'VIEW ALL', [], [ 'class'=>'btn btn-primary btn-sm', 'role' =>'button' ]) !!}
              {!! Html::linkRoute('posts.create', 'NEW', [], [ 'class'=>'btn btn-primary btn-sm', 'role' =>'button' ]) !!}
            </div><!-- btn-group -->
          </div><!-- col-sm-12 -->
        </div><!-- row -->
        <br>

        <div class="row">
          <div class="col-sm-12">
            {!! Form::open(['route'=>['posts.destroy', $post->id], 'method'=>'DELETE']) !!}
              {!! Form::submit('DELETE', ['class'=>'btn btn-default btn-block btn-sm']) !!}
            {!! Form::close() !!}
          </div><!-- col-sm-12 -->
        </div><!-- row -->
        <!-- end authentication section -->
        @endif
      </div><!-- col-sm-12 -->
    </div><!-- col-md-offset-1 col-md-3 well -->
  </div><!-- row -->
@stop