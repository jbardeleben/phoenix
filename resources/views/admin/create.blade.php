@extends('templates.admin')
@section('editor')
  <script>
  tinymce.init({
      selector:'textarea',
      plugins: 'link code hr',
      menubar: false,
      toolbar: 'undo redo | styleselect | bold italic underline hr | alignleft aligncenter alignright alignjustify | bullist numlist | link'
  });
  </script>
@endsection
@section('content')
<!-- ================================ BEGIN ================================ -->
    <article class="main">
      <h1>Article Form</h1>
      {!! Form::open(['route'=>'posts.store', 'class'=>'post-form']) !!}
        <p>
          <label for="title">Title: <span class="form-error">* Title is required</span></label><br>
          {{ Form::text('title', null, ['maxlength'=>'255']) }}
        </p>
        <p>
          <label for="slug">Slug: <span class="form-error">* Slug is required</span></label><br>
          {{ Form::text('slug', null, ['minlength'=>'5', 'maxlength'=>'255']) }}
        </p>
        <p>
          <label for="category">Category: <span class="form-error">* Category is required</span></label><br>
          {{ Form::select('category_id', $categories, null, ['placeholder' => '']) }}
        </p>
        <p>
          <label for="tags">Tags: <span class="form-error">* At least one tag is required</span></label><br>
          <select class="select2-multi" name="tags[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
          </select>
        </p>
        <p>
          <label for="body">Article Body: <span class="form-error">* Article Body is required</span></label><br>
          <br><textarea cols="50" rows="10" name="body"></textarea>
        </p>
        <p>{{ Form::submit('Publish Article', ['class'=>'bem-button button--state-primary btn-large', 'id'=>'publishForm']) }}</p>
      {!! Form::close() !!}
    </article>
<!-- ================================= END ================================= -->
@endsection