<!DOCTYPE html>
<html>
	<head>
		{{ get_title() }}
	</head>
	<body>
		<ul class="menu">
			<li><a href="{{ baseUri }}">Home</a></li>
			<li><a href="{{ baseUri }}signup">Sign up</a></li>
			<li><a href="{{ baseUri }}auth">Log in</a></li>
			<li><a href="{{ baseUri }}auth/logout/{{ sessionId }}">Log out</a></li>
		</ul>
		{{ content() }}
	</body>
</html>