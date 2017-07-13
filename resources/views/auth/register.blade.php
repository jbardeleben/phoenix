@extends('templates.forms')

@section('pagetitle', ' - Member Registration')

@section('content')
<?php
/*
 * REGISTRATION FORM. NOTES:
 * -----------------------------------------------------------------------------
 * This login form will be for guest users. Not sure at this point where Phoenix
 * is concerned what benefits will be gained, but for authors and administrators
 * I will have to register them myself. I want to set up an administrator login
 * form so that only authorized people can sign up people that want to contribute
 * content to the site (authors for articles, etc).
 */
?>
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="section-display">
							<h1 class="h1-login">Member Sign-up Form</h1>
							<p class="helper-br-3"></p>
						</div>
						<div class="panel panel-primary">
							<!--<div class="panel-heading panel-display">
								<h3 class="panel-title">Member Sign-up Form</h3>
							</div> panel-heading -->
							<div class="panel-body">
								<p class="red-notice"><em>All fields are required</em></p>
							{!! Form::open() !!}
								{{ Form::label('name', 'Your Full Name:') }}
								{{ Form::text('name', null, ['class' => 'form-control']) }}
								<p class="panel-spacer"></p>
								{{ Form::label('email', 'Email Address:') }}
								{{ Form::email('email', null, ['class' => 'form-control']) }}
								<p class="panel-spacer"></p>
								{{ Form::label('password', 'Password:') }}
								{{ Form::password('password', ['class' => 'form-control']) }}
								<p class="panel-spacer"></p>
								{{ Form::label('password_confirmation', 'Confirm Password:') }}
								{{ Form::password('password_confirmation', 
									['class' => 'form-control']) 
								}}
								<p class="panel-spacer"></p>
								{{ Form::submit('Register', 
									['class'=>'btn btn-primary btn-block btn-lg'])
								}}
							{!! Form::close() !!}
							</div><!-- panel-body -->
						</div><!-- panel panel-default -->
					</div><!-- col-md-6 -->
				</div><!-- row -->
				
@stop