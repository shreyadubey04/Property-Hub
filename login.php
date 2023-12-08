<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="project4.css">
</head>
<body>
	<form action="loginHandling.php" method="post">
		<h2>Login to the Portal:</h2>
		
		<?php if (isset($_GET['error'])) { ?>
			<p class = "error"><?php echo $_GET['error'];?></p>
		<?php } ?>
		
		<label>User Name:</label>
		<input type = "text" name = "userName" placeholder = "Type Here"><br>
		
		<label>Password:</label>
		<input type = "password" name = "password" placeholder = "Type Here"><br>
		
		<button type = "submit">Sign In</button>
		<a href = "signup.php" class = reroute>Don't have an account?<br>Create one here.</a>
</body>
</html>	