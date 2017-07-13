@extends('templates.forms')

@section('pagetitle', ' - Password Reset')

@section('content')
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1>Create a new password</h1>
						<p class="helper-br-3"></p>
						<div class="panel panel-primary">
							<div class="panel-heading">
								<h3 class="panel-title">New Password:</h3>
							</div><!-- panel-heading -->
							<div class="panel-body">
								{!! Form::open(['url'=>'password/reset']) !!}
									{{ Form::hidden('token', $token) }}
									{{ Form::label('email', 'Email Address:') }}
									{{ Form::email('email', $email, ['class'=>'form-control']) }}
									<p class="panel-spacer"></p>
									{{ Form::label('password', 'New Password:') }}
									{{ Form::password('password', ['class'=>'form-control']) }}
									<p class="panel-spacer"></p>
									{{ Form::label('password_confirmation', 'Confirm Password:') }}
									{{ Form::password('password_confirmation', 
										['class'=>'form-control'])
									}}
									<p class="panel-spacer"></p>
									{{ Form::submit('Create New Password &raquo;', 
										['class'=>'btn btn-primary btn-block btn-lg'])
									}}
								{!! Form::close() !!}
							</div><!-- panel-body -->
						</div><!-- panel panel-default -->
					</div><!-- col-md-6 col-md-offset-3 -->
				</div><!-- row -->
@stop