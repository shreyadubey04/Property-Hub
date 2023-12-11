<?php
include 'db_config.php';

// Fetch all properties from the 'properties' table
$sql = "SELECT * FROM properties";
$result = $conn->query($sql);

// Check if there are any properties
if ($result->num_rows > 0) {
    // Fetch all rows into an array
    $properties = $result->fetch_all(MYSQLI_ASSOC);
} else {
    // Handle the case when there are no properties
    echo "No properties found.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SELLER DASHBOARD</title>
    <link rel="stylesheet" href="./dashboard.css">
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>

    <div id="topDiv">
        <img id="logo" src="./LOGO.png">
        <h1 class="header" >Seller Dashboard</h1>
        <button id="logoutBtn" onclick="logoutUser(1)">Log Out</button>
    </div>
	
	    <!-- Navigation bar -->
    <div id="navigationBar">
        <button onclick="location.href='add_properties.php'">Add Property</button>
    </div>

    <!--Div creates top banner-->
    <div id="mainBanner"></div>

    <!-- Loop through each property and display its details -->
    <?php foreach ($properties as $property): ?>
        <div class="container">
            <div class="containerLeft">
                <div class="HouseName"><h2><?php echo $property['HouseName']; ?></h2></div>
                <div class="Location"><?php echo $property['Location']; ?></div>
                <div class="ListedOn">Listed on: <?php echo $property['ListedOn']; ?></div>
                <div class="Views">Total Views: <?php echo $property['Views']; ?></div>
                <div class="FloorPlan"><?php echo $property['FloorPlan']; ?></div>
                <p><strong>Your Offer: </strong></p>
                <div class="YourOffer"><h1 class="blueTitles">$<?php echo htmlspecialchars($property['YourOffer']); ?></h1></div>
                <br>
                <img src="<?php echo $property['HouseImg']; ?>" alt="House Image 1" height="300" width="400" />
                <br>

				 <button onclick="confirmDelete(<?php echo $property['houseID']; ?>)">Delete Property</button>
                <hr>
                <br>
                <br>
            </div>

            <div class="containerRight">
                <br>
                <img src="<?php echo $property['HouseImg']; ?>" alt="house" height="255" width="500" />
                <img src="<?php echo $property['HouseImg2']; ?>" alt="house" height="255" width="500" />
            </div>
        </div>

        <div id="fullDetails">
            <h1 class="header">Full Details</h1>
        </div>

        <div id="lowerHalf">

            <div id="contentLeft">
                <h2>Bedrooms & Bathrooms</h2>
                <div class="Bathrooms"><li>Bathrooms: <?php echo $property['Bathrooms']; ?></li> </div>
                <div class="Bedrooms"><li>Bedrooms: <?php echo $property['Bedrooms']; ?></li></div>
                <div class="FullBath"><li>Full Bathrooms: <?php echo $property['FullBath']; ?></li></div>

                <h2>Basement</h2>
                <div class="Basement"><li><?php echo $property['Basement']; ?></li></div>

                <h2>Kitchen</h2>
                <div class="BreakfastBar"><li><?php echo $property['Kitchen']; ?></li></div>

                <h2>Heating</h2>
                <div class="Heating"><li><?php echo $property['Heating']; ?></li></div>

                <h2>Cooling</h2>
                <div class="Cooling"><li><?php echo $property['Cooling']; ?></li></div>
            </div>

            <div id="contentRight">

                <h2>Parking</h2>
                <div class="Parking"><li><?php echo $property['Parking']; ?></li></div>

                <h2>Property</h2>
                <div class="Balconey"><li><?php echo $property['Property']; ?></li></div>

                <h2>Nearby Facilities</h2>
                <div class="Elementary School"><li><?php echo $property['NearbyFacilities']; ?></li></div>

                <h2>Tax Details</h2>
                <div class="Annual Tax"><li><?php echo $property['TaxDetails']; ?></li></div>
            </div>
        </div>
		
		
    <?php endforeach; ?>
	
	    <script>
        function confirmDelete(houseID) {
            var confirmation = confirm("Are you sure you want to delete this property?");
            if (confirmation) {
                // Call delete_property.php using AJAX
                $.ajax({
                    type: "POST",
                    url: "delete_property.php",
                    data: { houseID: houseID },
                    success: function(response) {
                        // Reload the page after successful deletion
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error("Error deleting property:", error);
                        alert("Error deleting property. Please try again.");
                    }
                });
            }
        }
    </script>

</body>
</html>
