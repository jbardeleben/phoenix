@extends('templates.forms')


@section('pagetitle', ' - Forgot Password')


@section('content')
			@if(session('status'))
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="alert alert-success" role="alert">
							<strong>{{ session('status') }}</strong>
						</div>
						<p class="panel-spacer"></p>
						<div class="alert alert-info" role="alert">
							<strong>You should definitely close this browser tab (or window) because the link in your email will automatically open up in a new tab (or window). Once you click that link, this tab (or window) will <em>NOT</em> recognize your new password, so you will not be able to log into your account from here. This is to help protect you against unauthorized access to your account (we take any efforts we can to help you protect your account).</strong>
						</div><!-- alert alert-success -->
					</div><!-- col-md-6 col-md-offset-3 -->
				</div><!-- row -->
			@else
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<div class="section-display">
							<h1 class="h1">Forgot your password?</h1>
							<p class="p-reg">
								It happens, no need to worry, we can help! Submit a <b>password reset request</b> below and we'll tell you what to do (<i>it's quick, we promise!</i>)
							</p>
							<p class="helper-hr-2"></p>
						</div>
						<div class="panel panel-primary">
							<div class="panel-heading panl-display">
								<h3 class="panel-title">Password Reset Request:</h3>
							</div><!-- panel-heading -->
							<div class="panel-body">
								{!! Form::open(['url'=>'password/email', 'method'=>'POST']) !!}
									{{ Form::label('email', 'Email Address:') }}
									{{ Form::email('email', null, ['class'=>'form-control']) }}
									<p class="panel-spacer"></p>
									{{ Form::submit('Reset My Password &raquo;', 
										['class'=>'btn btn-primary btn-block btn-lg'])
									}}
								{!! Form::close() !!}
							</div><!-- panel-body -->
						</div><!-- panel panel-primary -->
					</div><!-- col-md-6 col-md-offset-3 -->
				</div><!-- row -->
			@endif
@stop