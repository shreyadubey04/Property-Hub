<!DOCTYPE html>
<html>
<head>
	<title>Sign Up Page</title>
	<link rel="stylesheet" type="text/css" href="project4.css">
</head>
<body>
	<form action="signupHandling.php" method="post">
		<h2>Sign Up for the Portal:</h2>
		
		<?php if (isset($_GET['error'])) { ?>
			<p class = "error"><?php echo $_GET['error'];?></p>
		<?php } ?>
		
		<label>First Name:</label>
		<input type = "text" name = "firstName" placeholder = "Type Here"><br>
		
		<label>Last Name:</label>
		<input type = "text" name = "lastName" placeholder = "Type Here"><br>
		
		<label>Email Address:</label>
		<input type = "text" name = "email" placeholder = "Type Here"><br>
		
		<label>User Name:</label>
		<input type = "text" name = "userName" placeholder = "Type Here"><br>
		
		<label>Password:</label>
		<input type = "password" name = "password" placeholder = "Type Here"><br>
		
		<label>Re-enter Password:</label>
		<input type = "password" name = "rePassword" placeholder = "Type Here"><br>
		
		<button type = "submit">Sign Up</button>
		<a href = "login.php" class = reroute>Already have an account?<br>Log in here.</a>
</body>
</html>