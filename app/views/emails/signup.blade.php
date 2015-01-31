<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<p>Hi {{ $user->name }},</p>
		<p>Thank your for you for signing up with Nesti. Please click <a href="{{ route('activate', $activation_token) }}">here</a> to activate your account.</p>
		<p>Regards</p>
		<p>Nesti</p>
	</body>
</html>
