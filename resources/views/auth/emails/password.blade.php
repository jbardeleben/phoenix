Hey {{ $user->name }},

<p>
	We received a request that you wish to change or create a new password. As we strive to keep your account as safe as possible and as we respect your time, this will be very quick and easy!
</p>
<p>
	Use the following URL to create your new password: <br>
	<a href="{{ $link = url('password/reset', $token).'?email='.urlencode($user->getEmailForPasswordReset()) }}">{{ $link }}</a>
</p>
<p>
	If this URL does not work, you can simply copy and paste it into a new browser tab/window. It is highly recommended to not use the same one that you used to request a password change.
</p>
<p>
	<b>Note: If you received this in error, your password will still need to be reset.</b><br>When a request is received for a password reset, the asking account is automatically haulted to help protect the owner of the account (possible malicious intent, mis-typed email, or any variety of reasons that could be potentially harmful). We do apologize for the inconvenience, but we take account security seriously.
</p>