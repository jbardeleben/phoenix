@extends('templates.pages')

@section('pagetitle')
 - Editing {{ $user->title }}
@stop

@section('bannertitle')
Editing {{ $user->title }}
@stop

@section('stylesheets')
{!! Html::style('css/parsley.css') !!}
@stop

@section('content')
      {!! Form::model($user, ['route'=>['users.update', $user->id], 'method'=>'PUT']) !!}
        <div class="col-md-8">
          <p class="space">
            {{ Form::label('name', 'Your Full Name:') }}
            {{ Form::text('name', null, ['class'=>'form-control input-lg']) }}
          </p>
          <p class="space">
            {{ Form::label('email', 'Email Address:') }}
            {{ Form::email('email', null, ['class'=>'form-control']) }}
          </p>
        </div><!-- col-md-8 -->
        
        <div class="col-md-4">
          <div class="well">
            <div class="row">
              <dl class="dl-horizontal">
                <dt>Created: </dt>
                <dd>{{ date('M d, Y, H:i', strtotime($user->created_at)) }}</dd>
                <dt>Last Updated: </dt>
                <dd>{{ date('M d, Y, H:i', strtotime($user->updated_at)) }}</dd>
              </dl>
            </div><!-- row -->
            <!-- Authenticated links (authentication not currently set up) -->
            <hr>
            <div class="row">
              <div class="col-sm-6">
                <!-- the save button should be below the form as well for long articles -->
                {{ Form::submit('SAVE', ['class'=>'btn btn-success btn-block btn-lg']) }}
              </div><!-- col-sm-6 -->
              <div class="col-sm-6">
                {!! Html::linkRoute('users.show', 'CANCEL', array($user->id), ['class'=>'btn btn-danger btn-block btn-lg']) !!}
              </div><!-- col-sm-6 -->
            </div><!-- row -->
          </div><!-- well -->
        </div><!-- col-md-4 -->
      {!! Form::close() !!}
@stop
