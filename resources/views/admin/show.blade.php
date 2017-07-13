@extends('templates.admin')

@section('content')
<!-- ================================ BEGIN ================================ -->
  <article class="main">
    <h1>{{ $post->title }}</h1>
    <p style="border-bottom: 1px dashed #bbbbbb; width: 100%; height: 1px;"></p>
    <h3>{!! $post->user->name !!}, {{ date('F d, Y', strtotime($post->created_at)) }}</h3>
    <p class="">
      {!! $post->body !!}
    </p>
    <p style="border-bottom: 5px solid #999999; width: 100%; height: 1px;"></p>
    <p><em>{{ $post->user->name }}</em> | <a href="mailto:{{ $post->user->email }}">{{ $post->user->email }}</a></p>
    <p>Category: <em>{{ $post->category->name }}</em></p>
    <p>
      Tags: 
      @foreach($post->tags as $tag)
      <a href="{{ route('tags.show', $tag->id) }}" class="label label-default">{{ $tag->name }}</a> 
      @endforeach
    </p>
    <p>Published on: </p>
    <p>Permalink: <a href="{{ route('blog.single', $post->slug) }}">{{ route('blog.single', $post->slug) }}</a></p>

    <h3>Comments <small>{{ $post->comments()->count() }} total</small></h3>
    <p>
      @foreach($post->comments as $comment)
      {{ $comment->name }}<br>
      {{ $comment->email }}<br>
      {{ $comment->comment }}<br>
      <a href="{{ route('comments.edit', $comment->id) }}" class="bem-button button--state-default">EDIT</a> | 
      <a href="{{ route('comments.delete', $comment->id) }}" class="bem-button button--state-danger">DELETE</a>
      @endforeach
    </p>
    <p></p>
    <p></p>
    <p></p>
  </article>
<!-- ================================= END ================================= -->
@endsection