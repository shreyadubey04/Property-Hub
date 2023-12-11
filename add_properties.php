<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submission
    $newValues = array();

    // Retrieve and validate form data
    foreach ($_POST as $key => $value) {
        $newValues[$key] = $conn->real_escape_string($value);
    }

    // Insert new property into the database
    $columns = implode(", ", array_keys($newValues));
    $values = "'" . implode("', '", array_values($newValues)) . "'";
    $insertQuery = "INSERT INTO properties ($columns) VALUES ($values)";

    if ($conn->query($insertQuery)) {
        // Property added successfully, redirect to dashboard.php
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Error adding property: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Property</title>
    <link rel="stylesheet" href="./add_property.css">
</head>
<body>

    <form action="add_properties.php" method="post">
        <label for="HouseName">House Name:</label>
        <input type="text" name="HouseName" required>

        <label for="Location">Location:</label>
        <input type="text" name="Location" required>

        <label for="ListedOn">Listed On:</label>
        <input type="date" name="ListedOn" required>

        <label for="Views">Total Views:</label>
        <input type="number" name="Views" required>

        <label for="FloorPlan">Floor Plan:</label>
        <input type="text" name="FloorPlan" required>

        <label for="YourOffer">Your Offer:</label>
        <input type="text" name="YourOffer" required>

        <label for="HouseImg">House Image:</label>
        <input type="text" name="HouseImg" required>

        <label for="HouseImg2">House Image 2:</label>
        <input type="text" name="HouseImg2" required>

        <label for="Bathrooms">Bathrooms:</label>
        <input type="number" name="Bathrooms" step="0.1" required>

        <label for="Bedrooms">Bedrooms:</label>
        <input type="number" name="Bedrooms" required>

        <label for="FullBath">Full Bathrooms:</label>
        <input type="number" name="FullBath" required>

        <label for="Basement">Basement:</label>
        <input type="text" name="Basement" required>

        <label for="Kitchen">Kitchen:</label>
        <input type="text" name="Kitchen" required>

        <label for="Heating">Heating:</label>
        <input type="text" name="Heating" required>

        <label for="Cooling">Cooling:</label>
        <input type="text" name="Cooling" required>

        <label for="Parking">Parking:</label>
        <input type="text" name="Parking" required>

        <label for="Property">Property:</label>
        <input type="text" name="Property" required>

        <label for="NearbyFacilities">Nearby Facilities:</label>
        <input type="text" name="NearbyFacilities" required>

        <label for="TaxDetails">Tax Details:</label>
        <input type="text" name="TaxDetails" required>

        <button type="submit">Add Property</button>
    </form>

</body>
</html>


 