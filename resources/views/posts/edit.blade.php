@extends('templates.pages')

@section('pagetitle')
 - Editing {{ $post->title }}
@stop

@section('bannertitle')
Editing {{ $post->title }}
@stop

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('css/select2.css') !!}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
	tinymce.init({
		selector:'textarea',
		plugins: 'link',
		menubar: false
	});
</script>
@stop

@section('content')
			<div class="row">
				<div class="col-md-12">
					<h1>Editing:<br>"{{ $post->title }}"</h1>
					<hr>
			{!! Form::model($post, ['route'=>['posts.update', $post->id], 'method'=>'PUT']) !!}
			<div class="col-md-8">
				<p class="space">
					{{ Form::label('title', 'Title:') }}
					{{ Form::text('title', null, ['class'=>'form-control input-lg']) }}
				</p>
				<p class="space">
					{{ Form::label('slug', 'URL Slug:') }}
					{{ Form::text('slug', null, ['class'=>'form-control']) }}
				</p>
				<p class="space">
					{{ Form::label('category_id', 'Category:') }}
					{{ Form::select('category_id', $categories, null,
						[
							'class' => 'form-control',
							'placeholder' => ''
						])
					}}
				</p>
				<p class="space-tags">
					{{ Form::label('tags', 'Tags:') }}
					{{ Form::select('tags[]', $tags, null, ['class'=>'form-control select2-multi', 'multiple'=>'multiple']) }}
				</p>
				<p class="space">
					{{ Form::label('body', 'Current Content:') }}
					{{ Form::textarea('body', null, 
						[
							'class'   =>'form-control'
						]) 
					}}
				</p>
			</div>

			<div class="col-md-4">
				<div class="well">
					<div class="row">
						<dl class="dl-horizontal">
							<dt>Created: </dt>
							<dd>{{ date('M d, Y, H:i', strtotime($post->created_at)) }}</dd>
							<dt>Last Updated: </dt>
							<dd>{{ date('M d, Y, H:i', strtotime($post->updated_at)) }}</dd>
							<dt>Category: </dt>
							<dd>{{ $post->category->name }}</dd>
							<dt>Tags: </dt>
							<dd class="tags">
							@foreach($post->tags as $tag)
								<span class="label label-grey-sm">{{ $tag->name }}</span>
							@endforeach
							</dd>
						</dl>
					</div>
					<!-- Authenticated links (not currently set up) -->
					<hr>
					<div class="row">
						<div class="col-sm-6">
						<!-- the save button should be below the form as well for long articles -->
							{{ Form::submit('SAVE',
								['class'=>'btn btn-primary btn-block btn-lg'])
							}}
						</div>
						<div class="col-sm-6">
							{!! Html::linkRoute('posts.show', 'CANCEL', [$post->id], 
								[
									'class'=>'btn btn-default btn-block btn-lg'
								])
							!!}
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-sm-12">
							{!! Html::linkRoute('posts.create', 'CREATE NEW ARTICLE', [], 
								[
									'class'=>'btn btn-primary btn-block btn-sm'
								])
							!!}
							{!! Html::linkRoute('posts.index', 'VIEW ALL ARTICLES', [], 
								[
									'class'=>'btn btn-primary btn-block btn-sm'
								])
							!!}
							{!! Html::linkRoute('categories.index', 'Create New Category', [], 
								[
									'class'=>'btn btn-primary btn-block btn-sm'
								])
							!!}
							{!! Html::linkRoute('tags.index', 'Create New Tag', [], 
								[
									'class'=>'btn btn-primary btn-block btn-sm'
								])
							!!}
						</div>
					</div>
				</div>
			</div>
			{!! Form::close() !!}
@stop

@section('footerScripts')
	{!! Html::script('js/parsley.min.js') !!}
	{!! Html::script('js/select2.min.js') !!}

	<script type="text/javascript">
		$(".select2-multi").select2();
		$(".select2-multi").select2().val({!! json_encode($post->tags()->getRelatedIds()) !!}).trigger("change");
	</script>
@stop