<?php 

function validate($data) {
	$data = trim($data);
	$data = htmlspecialchars($data);
	$data = stripslashes($data);
		
	return $data;
}
	
if (isset($_POST['firstName']) && isset($_POST['lastName']) && isset($_POST['email']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['rePassword'])) {
	
	$firstName = validate($_POST['firstName']);
	$lastName = validate($_POST['lastName']);
	$userName = validate($_POST['userName']);
	$email = validate($_POST['email']);
	$rePassword = validate($_POST['rePassword']);
	$password = validate($_POST['password']);
	
	if (empty($firstName)) {
		header("Location: signup.php?error=Enter a valid First Name");
		exit();
	} else if (empty($lastName)) {
		header("Location: signup.php?error=Enter a valid Last Name");
		exit();	
	} else if (empty($userName)) {
		header("Location: signup.php?error=Enter a valid User Name");
		exit();	
	} else if (empty($email)) {
		header("Location: signup.php?error=Enter a valid Email");
		exit();	
	} else if (empty($password)) {
		header("Location: signup.php?error=Enter a valid Password");
		exit();	
	} else if (empty($rePassword)) {
		header("Location: signup.php?error=Enter the same valid Password");
		exit();	
	} else {
		# duys code will go here
	}
	
} else {
	header("Location: signup.php");
	exit();
}
?>