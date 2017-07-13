@extends('templates.pages')

@section('pagetitle', ' - View All Tags')
@section('bannertitle', 'All Current Tags')

@section('scripts')
{!! Html::style('css/select2.css') !!}
{!! Html::script('js/tag-search.js') !!}
@endsection

@section('content')
  <!-- TODO: Remove presentation (style attributes) to main.css -->
  <div class="row">
    <div class="col-md-12">
      <h1>Tags</h1>
      <div class="row">
        <!-- Tag Searchbar for quickly looking if a tag already exists -->
        <div class="col-lg-6 col-md-6">
          <div id="tag-search">
            <form id="tag-searchbox" style="margin-bottom: 20px;">
              <input type="text" onKeyUp="showResult(this.value)" class="form-control" placeholder="Search all tags...">
              <div id="livesearch"></div>
            </form>
          </div><!-- tag-search -->
        </div><!-- col-md-6 -->

        <!-- Create Tag Form to create new tags (only one at a time) -->
        <div class="col-lg-6 col-md-6">
          {!! Form::open(['route'=>'tags.store','class'=>'form-inline']) !!}
            <div class="input-group">
              <input type="text" name="name" class="form-control" placeholder="Create New Tag...">
              <span class="input-group-btn">
                <input type="submit" class="btn btn-primary" value="Add Tag">
              </span>
            </div>
          {!! Form::close() !!}
        </div><!-- col-md-6 -->
      </div><!-- row -->

      <!-- button group for article control panel actions -->
      <div class="row">
        <div class="col-lg-6 col-md-6 hidden-xs hidden-sm">
          <div class="btn-group btn-group-justified" role="group" aria-label="Article Control Panel">
            <a href="{{ route('posts.create') }}" class="btn btn-primary" aria-label="Create New Post">New Post</a>
            <a href="{{ route('posts.index') }}" class="btn btn-primary" aria-label="View All Posts">All Posts</a>
            <a href="{{ route('categories.index') }}" class="btn btn-primary" aria-label="Categories">Categories</a>
          </div><!-- btn-group"-->
        </div><!-- col-md-6 hidden under desktop size -->
      </div><!-- row -->
    </div><!-- col-md-12 (parent column) -->
  </div><!-- row (parent row) -->

  <p style="height: 20px;"></p><!-- spacer -->
  <p>Click on the Tag link to view/edit the tag and view articles it's attached to</p>
  <div class="row">
    <div class="col-md-12">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th># of Articles</th>
          </tr>
        </thead>
        <tbody>
          @foreach($tags as $tag)
          <tr>
            <th>{{ $tag->id }}</th>
            <td><a href="{{ route('tags.show', $tag->id) }}">{{ $tag->name }}</a></td>
            <td><span class="label label-default">{{ $tag->posts()->count() }} Articles</span></td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <hr>
      <div class="text-center">
        <nav><ul class="pagination">{!! $tags->links(); !!}</ul></nav>
        Page {!! $tags->currentPage(); !!} of {!! $tags->lastPage(); !!}
      </div><!-- text-center -->
    </div><!-- col-md-12 -->
  </div><!-- row -->

@endsection