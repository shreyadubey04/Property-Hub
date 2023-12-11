<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validate house ID
    if (!isset($_POST['houseID']) || !is_numeric($_POST['houseID'])) {
        // Return error response if the houseID is missing or not a number
        echo "Invalid house ID.";
        exit();
    }

    $houseID = (int)$_POST['houseID'];

    // Delete the property from the database
    $deleteQuery = "DELETE FROM properties WHERE houseID = $houseID";
    if ($conn->query($deleteQuery)) {
        // Return success response
        echo "Property deleted successfully!";
    } else {
        // Return error response
        echo "Error deleting property: " . $conn->error;
    }
} else {
    // Return error response if the request method is not POST
    echo "Invalid request method.";
}
?>
