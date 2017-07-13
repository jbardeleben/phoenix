@extends('templates.pages')

@section('pagetitle', ' - Compose A New Article')

@section('bannertitle', 'Compose A New Article')

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('css/select2.css') !!}

<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
<script>
tinymce.init({
    selector:'textarea',
    plugins: 'link code hr',
    menubar: false,
    toolbar: 'undo redo | styleselect | bold italic underline hr | alignleft aligncenter alignright alignjustify | bullist numlist | link'
});
</script>

<style type="text/css">
.left-sidebar {
  color: #cccccc;
  top: 0; /*-50px;*/
  left: 0;
  padding: 0;
  background-color: #333333;
}
.left-sidebar > h1 {
  color: #dddddd;
  font-size: 16px;
  padding: 0 0 0 24px;
}
.left-sidebar ul {
  padding: 0; margin: 0;
  display: block;
  border-top: 2px solid #777777;
}
.left-sidebar ul.ul1 li {
  color: #cccccc; margin: 0;
  padding-left: 24px;
  display: block;
  background-image: url(http://laravel/dots.png) no-repeat left center;
}
.left-sidebar li:hover {
  color: #eeeeee;
  background-color: #000033;
}
.left-sidebar a {
  color: #cccccc;
  display: block;
  padding: 10px 0 10px 0;
  text-decoration: none;
}
.left-sidebar a:hover {
  color: #eeeeee;
  display: block;
  text-decoration: none;
}
</style>
@stop

@section('content')
<!--<div class="row">
  <div class="col-md-12">
    <h1>Compose Your New Ariticle</h1>
    <hr>
  </div> col-md-12 -->
<!--</div> row -->
	
<!--
<div class="row">
  <div class="col-md-2 left-sidebar">
    <h1>Left Sidebar</h1>
    <ul class="ul1">
      <li><a href="">Compose Article</a></li>
      <li><a href="">Publish Article</a></li>
      <li><a href="">Update Tags</a></li>
      <li><a href="">Update Categories</a></li>
      <li><a href="">Reset Article</a></li>
    </ul>
  </div> left-sidebar
</div> row 
-->
<div class="row">
  <div class="col-md-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title" style="border-bottom: 1px solid #054405;padding-bottom: 5px;margin-bottom: 5px;">
          New Article Form
        </h3>
        <p>
          Use this form to create a new Aricle. See sidebar for additional notes.
        </p>
      </div><!-- panel-heading -->
      <div class="panel-body">
        {!! Form::open(['route'=>'posts.store', 'data-parsley-validate'=>'']) !!}
          {{ Form::label('title', 'TITLE:') }}
          {{ Form::text('title', null, ['class'=>'form-control', 'required'=>'', 'maxlength'=>'255']) }}

          <p class="panel-spacer"></p>
          {{ Form::label('slug', 'SLUG: (* see sidebar notification)') }}
          {{ Form::text('slug', null, ['class'=>'form-control', 'required'=>'', 'minlength'=>'5', 'maxlength'=>'255']) }}

          <p class="panel-spacer"></p>
          {{ Form::label('category_id', 'CATEGORY: (* only 1 per article)') }}
          {{ Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => '']) }}

          <p class="panel-spacer"></p>
          {{ Form::label('tags', 'TAGS:') }}
          <select class="form-control select2-multi" name="tags[]" multiple="multiple">
          @foreach($tags as $tag)
            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
          @endforeach
          </select>

          <p class="panel-spacer"></p>
          {{ Form::label('body', 'ARTICLE BODY:') }}
          {{ Form::textarea('body', null, ['class'   =>'form-control']) }}

          <p class="panel-spacer"></p>
          {{ Form::submit('Publish Article', ['class'=>'btn btn-success btn-lg btn-block space', 'id'   =>'publishForm']) }}

          <hr>
          <p style="font-weight: bold;">
            This is a just "in-case" something goes completely awry and you need to start over. It happens - writers block, lost concentration, you name it, we will have it happen to us all at some point as a Journalist.
            <br>
            <small style="font-weight: 900; color: #CC0000">* NOTE: This can NOT be undone once reset, use at your own discression!</small>
          </p>
          {{ Form::reset('Clear the Entire Form', ['class'=>'btn btn-default space']) }}
        {!! Form::close() !!}
      </div><!-- panel-body -->
    </div><!-- panel panel-success -->
  </div><!-- col-md-8 (parent column) -->

  <!-- CREATE SIDE BAR (PANEL 1) -->
  <div class="col-md-4">
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3>Other Options</h3>
      </div><!-- panel-heading -->
      <div class="panel-body">
        <p class="well">
          Note: If you navigate to these tags, you will be leaving this page, meaning any unsaved work <em>will potentially be lost</em>.
        </p>
        <p><a href="{{ route('tags.index') }}" class="btn btn-primary btn-block">Tags</a></p>
        <p><a href="{{ route('categories.index') }}" class="btn btn-primary btn-block">Categories</a></p>
        <p><a href="{{ route('posts.create') }}" class="btn btn-primary btn-block disabled" title="NOT SET UP"><em>Save As Draft</em> (**)</a></p>
      </div><!-- panel-body -->
    </div><!-- panel panel-info (panel 1) -->

    <!-- PANEL 2 -->
    <div class="panel panel-info">
      <div class="panel-heading">
        <h3 class="panel-title" style="border-bottom: 1px solid #31708f;padding-bottom: 5px;margin-bottom: 5px;">
          Notice about <em>slugs</em>:
        </h3>
        <p>
          The slug can contain any alpha-numeric character, a dash, or an underscore. Any spaces or other characters will be replaced automatically with a dash.
        </p>
      </div><!-- panel-heading -->
      <div class="panel-body bg-info">
        <p class="text-info">
          When working with slugs, our suggestion is to remove any punctuation characters and replace any spaces with a dash. If the title has a space-dash-space in it (for example: <code>asdf - asdf</code>), just use a single dash (for example: <code>asdf-asdf</code>). This will help keep the slugs as unique as possible as no two posts can share a URL slug.
        </p>
      </div><!-- panel-body -->
    </div><!-- panel panel-info (panel 2) -->

  </div><!-- col-md-4 (parent sidebar column) -->
</div><!-- row (parent row) -->
@stop

@section('footerScripts')
  {!! Html::script('js/parsley.min.js') !!}
  {!! Html::script('js/select2.min.js') !!}

  <script type="text/javascript">
  $(".select2-multi").select2();
  </script>
@stop
<?php
/**
 * NOTES:
 * -----------------------------------------------------------------------------
 * I want to create a drafts table so that users can save the post as a draft. I
 * will make it so that when the draft is published, a new post will be made to
 * the posts table and the draft will be removed from the drafts table. This can
 * be a great feature to have.
 *
 * Tags and Categories:
 * I want to set up a mechanism to create tags and categories on the fly (I will
 * most likely do this via jQuery/AJAX) so that if one is not available when an
 * article is being created, there will be no need to leave the post, create the
 * tag/category in question, come back to post and start over (what I have been
 * doing in the mean time is creating the post, then add what I need, and then I
 * go to the posts admin panel and edit said post, but very inconvenient and it
 * can be time consuming as well)
 */
?>