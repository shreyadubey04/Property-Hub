<?php 

function validate($data) {
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
		
	return $data;
}
	
if (isset($_POST['userName']) && isset($_POST['password'])) {
	
	$userName = validate($_POST['userName']);
	$password = validate($_POST['password']);
	
	if (empty($userName)) {
		header("Location: login.php?error=Enter a valid User Name");
		exit();
	} else if (empty($password)) {
		header("Location: login.php?error=Enter a valid Password");
		exit();
		
	} else {
		# duys code will go here
	}
	
} else {
	header("Location: login.php");
	exit();
}
?>