<?php
include 'db_config.php';

function validate($data) {
    $data = trim($data);
    $data = htmlspecialchars($data);
    $data = stripslashes($data);
    return $data;
}

if (isset($_POST['userName']) && isset($_POST['password'])) {
    $userName = validate($_POST['userName']);
    $password = validate($_POST['password']);

    if (empty($userName) || empty($password)) {
        header("Location: login.php?error=Please enter both username and password");
        exit();
    }

    $stmt = $conn->prepare("SELECT userID, userName, password FROM users WHERE userName = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        $stmt->bind_result($userID, $dbUserName, $dbPassword);
        $stmt->fetch();

        if (password_verify($password, $dbPassword)) {
            // Password is correct, log in the user
            session_start();
            $_SESSION['user_id'] = $userID;  // Store user ID in session for future use
            header("Location: dashboard.php");
            exit();
        } else {
            // Password is incorrect
            header("Location: login.php?error=Incorrect password");
            exit();
        }
    } else {
        // User not found
        header("Location: login.php?error=User not found");
        exit();
    }

    // Close the statement
    $stmt->close();
} else {
    header("Location: login.php");
    exit();
}
?>
