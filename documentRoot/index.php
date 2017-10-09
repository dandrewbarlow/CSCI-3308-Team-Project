<!-- <?php //include('includes/login.php') ?> -->
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Login | Pi In The Sky</title>
		<link rel="stylesheet" href="/css/style.css">
	</head>
	<body>
		<div class="header">
			<h1>Pi In the Sky</h1>
		</div>
		<div class="extra-space"></div>
		<div class="login-form">
			<h2>Login</h2>
			<form class="login" action="index.php" method="post">
				<div class="input-group">
					<label>Username</label>&nbsp;
					<input type="text" name="username" value="">
				</div>
				<div class="input-group">
					<label>Password</label>&nbsp;
					<input type="password" name="password" value="">
				</div>
				<div class="input-group">
					<button type="submit" name="login" class="btn">Login</button>
				</div>
			</form>
		</div>

		<div class="footer" style="padding: 10px;">
			&copy; The Pi.in.the.Sky Team
		</div>
	</body>
</html>
