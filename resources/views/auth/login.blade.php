@extends('templates.forms')

@section('pagetitle', ' - Member Login')

@section('content')
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="section-display">
							<h1 class="h1-login">Member Login</h1>
							<p class="helper-br-3"></p>
						</div>
						<div class="panel panel-primary">
							<!--<div class="panel-heading panel-display">
								<h3 class="panel-title">Sign into Phoenix Revolution</h3>
							</div> panel-heading -->
							<div class="panel-body">
							{!! Form::open() !!}
								{{ Form::label('email', 'Email Address:') }}
								{{ Form::email('email', null, ['class' => 'form-control']) }}
								<p class="panel-spacer"></p>
								{{ Form::label('password', 'Password:') }}
								{{ Form::password('password', ['class' => 'form-control']) }}
								<p class="panel-spacer"></p>
								{{ Form::checkbox('Remember') }}
								{{ Form::label('remember', 'Remember Me') }} 
								(Your account security matters! Uncheck on public devices!)
								<p class="panel-spacer"></p>
								{{ Form::submit('Login', 
									['class'=>'btn btn-primary btn-block btn-lg'])
								}}
							{!! Form::close() !!}
							<p class="panel-spacer">
								<a href="{{ url('password/reset') }}">Forgot Your Password?</a>
								&nbsp;&nbsp;|&nbsp;&nbsp;
								<a href="{{ route('register') }}">Don't have an account?</a>
							</p>
							</div><!-- panel-body -->
						</div><!-- panel panel-default -->
					</div><!-- col-md-6 -->
				</div><!-- row -->
@stop