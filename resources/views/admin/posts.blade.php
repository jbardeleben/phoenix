@extends('templates.admin')

@section('content')
<!-- ================================ BEGIN ================================ -->
    <article class="main">
      <h1>My Articles</h1>
      @foreach($posts as $post)
      <p class="recent-posts">
        <h2>
          <a href="{{ route('blog.single', $post->slug) }}">{!! $post->title !!}</a><br>
          <small>
            {!! date('F j, Y', strtotime($post->created_at)) !!}&nbsp;&nbsp;|&nbsp;&nbsp;
            {!! $post->category->name !!}
          </small>
        </h2>
        <p>
          {{ str_limit(strip_tags($post->body, 250)) }}
          {{ strlen(strip_tags($post->body)) > 250 ? ' [...]' : '' }}
        </p>
        <a href="{{ route('admin.show', $post->id) }}" class="bem-button button--state-default">View &raquo;</a>
      </p><!-- post -->
      @endforeach
    </article>
<!-- ================================= END ================================= -->
@endsection