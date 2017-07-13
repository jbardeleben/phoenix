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
		{!! Form::open(['route'=>'admin.store', 'class'=>'post-form']) !!}
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
		<p>
		{{ Form::submit('Save Draft (*)', ['class'=>'bem-button button--state-default btn-large', 'id'=>'publishForm']) }}
		&nbsp;&nbsp;
		{{ Form::submit('Save &amp; Publish', ['class'=>'bem-button button--state-primary btn-large', 'id'=>'publishForm']) }}
		</p>
		<p>
			-- <em>These sections/functions labeled '(*)' denotes functionality that is not yet ready to be utilized</em>
		</p>
		{!! Form::close() !!}
		<hr>

		<!-- RECENT ARTICLES SECTION (currently limited to the latest 3) -->
		<h1>My Articles (recent 3)</h1>
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
		<hr>

		<!-- Additional section for more content (probably a users table) -->
		<h2>Another Section</h2>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		</p>
		<p>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
		</p>
	</article>
<!-- ================================= END ================================= -->
@endsection