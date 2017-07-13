@extends('templates.pages')

@section('pagetitle')
 - {{ $tag->name }}
@stop

@section('bannertitle')
TAG INFO FOR: {{ $tag->name }}
@stop

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('css/select2.css') !!}
@stop

@section('content')
  <div class="row">
    <div class="col-md-12">
      <h1>Tag: {{ $tag->name }}
        <small>(Tagged in {{ $tag->posts()->count() }} Articles)</small>
      </h1>
      <hr>
    </div><!-- col-md-12 -->
  </div><!-- row -->

  <div class="row">
    <div class="col-md-4">
      <div class="btn-group btn-group-justified" role="group" aria-label="Toolbar">
        <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-primary">Edit</a>
        <a href="{{ route('tags.index') }}" class="btn btn-primary">View All</a>
      </div><!-- btn-group -->
    </div><!-- col-md-4 -->
    <div class="col-md-2">
      {{ Form::open(['route'=>['tags.destroy', $tag->id], 'method'=>'DELETE']) }}
        {{ Form::submit('Delete', ['class'=>'btn btn-default btn-block']) }}
      {{ Form::close() }}
    </div><!-- col-md-2 -->
    <div class="col-md-6">
      <!-- spacer placeholder for now -->
    </div><!-- col-md-6 -->
  </div><!-- row -->

  <br><br><br>
  <hr>

  <div class="row">
    <div class="col-md-12">
      <h3>Articles with this tag:</h3>
        <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Title</th>
            <th>Tags</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
        @foreach($tag->posts as $post)
          <tr>
            <th>{{ $post->id }}</th>
            <td>{{ $post->title }}</td>
            <td>
              @foreach($post->tags as $tag)
              <a href="{{ route('tags.show', $tag->id) }}" class="label label-grey">{{ $tag->name }}</a>
              @endforeach
            </td>
            <td>
              <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-xs btn-block" title="View this post">View Post</a>
            </td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div><!-- col-md-12 -->
  </div><!-- row -->
@endsection