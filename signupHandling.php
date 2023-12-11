<?php
include 'db_config.php';

function validate($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if (
    isset($_POST['firstName']) &&
    isset($_POST['lastName']) &&
    isset($_POST['email']) &&
    isset($_POST['userName']) &&
    isset($_POST['password']) &&
    isset($_POST['rePassword'])
) {
    $firstName = validate($_POST['firstName']);
    $lastName = validate($_POST['lastName']);
    $userName = validate($_POST['userName']);
    $email = validate($_POST['email']);
    $rePassword = validate($_POST['rePassword']);
    $password = validate($_POST['password']);

    if (empty($firstName) || empty($lastName) || empty($userName) || empty($email) || empty($password) || empty($rePassword)) {
        header("Location: signup.php?error=Please fill in all fields");
        exit();
    }

    if ($password !== $rePassword) {
        header("Location: signup.php?error=Passwords do not match");
        exit();
    }

    // Use prepared statements to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (firstName, lastName, userName, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $firstName, $lastName, $userName, $email, $hashedPassword);

    // After validating input, hash the password before storing it
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    if ($stmt->execute()) {
        // Registration successful
        header("Location: login.php");
        exit();
    } else {
        // Handle database error
        header("Location: signup.php?error=Database error");
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    header("Location: signup.php");
    exit();
}
?>
