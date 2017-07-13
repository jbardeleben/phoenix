@extends('templates.pages')


@section('pagetitle', ' - Logout')
@section('bannertitle', 'Thank you for using Wavlite!')
@section('leader', 'Not ready to leave yet?')
@section('bannerbutton')
			<p>
				<a href="/auth/login" class="btn btn-primary">Log Back In!</a>
			</p>
@stop

<?php
/*
 * I am going to set a JavaScript timer for this page so that after 10 sections
 * the page will automatically redirect to the home page.
 */
?>

@section('content')
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<h1>Logout View</h1>
						<p>
							Nothing to show here at this time. Good place to remind users of any upcoming events or other "reminder" messages.
						</p>
						<a href="/" class="btn btn-primary">Home</a>
					</div><!-- col-md-8 col-md-offset-2 -->
				</div><!-- row -->
@stop