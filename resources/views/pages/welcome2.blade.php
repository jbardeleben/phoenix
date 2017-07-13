@if (Auth::check())
	@include('templates.partials._member')
@else
	@include('templates.partials._welcome')
@endif

<?php
/*
 * THIS WILL BE FOR THE WAVLITE PROJECT - DO NOT DELETE FROM HERE YET
 *
 * This is the new idea for templating out and toggleing the homepage URL. This
 * will allow www.wavlite.com to tailor to the user based on authentication.
 * 
 * This is completely untested for now, but the idea here is to toggle the home
 * page based on the authentication status of a user. If the user is logged in,
 * then I want to show the service, with "home" being called to the welcome URL
 * and just www.wavlite.com being the service they interact with.
 * 
 * For non-authenticated members, www.wavlite.com will be the splash page which
 * they will be able to gain information about the service, register, login, or
 * follow our social media links, but they will NOT be able to use the Wavlite
 * Search service. Although, I would like to have a test version where they can
 * visit a demo version of it but they will not be able to interact with it and
 * save (but still store as a demo) searchlists, nor share what they create in
 * the demo version - also note that this demo version will NOT store a cookie
 * of what the user will have stored in the searchlist container.
 */
 