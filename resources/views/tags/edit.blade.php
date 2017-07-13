@extends('templates.pages')

@section('pagetitle')
 - Editing {{ $tag->name }}
@stop

@section('bannertitle')
Editing {{ $tag->name }}
@stop

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
{!! Html::style('font-awesome/css/font-awesome.min.css') !!}
{!! Html::style('css/select2.css') !!}
@stop

@section('content')
	<div class="row">
		<div class="col-md-8">

		{{ Form::model($tag, ['route'=>['tags.update', $tag->id], 'method'=>'PUT']) }}
			{{ Form::label('name', 'Title:') }}
			{{ Form::text('name', null, ['class'=>'form-control']) }}
			<br><br>
			{{ Form::submit('Save Changes', ['class'=>'btn btn-primary']) }}
		{{ Form::close() }}
		
		</div><!-- col-md-8 -->
	</div><!-- row -->
@endsection