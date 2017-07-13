<?php

/**
 * This is a testing function (NOT FOR PRODUCTION) to toggle (manually of course
 * as this is in development) navigation buttons betwee a simulated user that is
 * logged in or not logged in.
 * @see templates\partials\_nav.blade.php
 * @return void
 */
function returnUser() {
	$null = "";
	$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : $null;
	if ($user !== null || $user !== "") { return $user; }
	else { return null; }
}
