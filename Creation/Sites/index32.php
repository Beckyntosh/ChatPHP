<?php
// DB connection
$servername = "db";
$username = "root";
$password = 'root';
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_type VARCHAR(30) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    neighborhood_features TEXT,
    latitude DECIMAL(10, 8) NOT NULL,
    longitude DECIMAL(11, 8) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($createTableSql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert dummy data
$insertSql = "INSERT INTO properties (property_type, price, neighborhood_features, latitude, longitude)
VALUES ('House', 300000, 'Near park, Quiet neighborhood', 34.052235, -118.243683);";
$conn->query($insertSql); // In a real app, you would check for success

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Interactive Map Search</title>
    <style>
        /* Basic styling */
        body { font-family: Arial, sans-serif; }
        #map { height: 400px; width: 100%; }
    </style>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap" async defer></script>
    <script>
        let map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 34.052235, lng: -118.243683},
                zoom: 10
            });

            fetch('getProperties.php')
            .then(response => response.json())
            .then(data => {
                data.forEach(property => {
                    new google.maps.Marker({
                        position: {lat: property.latitude, lng: property.longitude},
                        map: map,
                        title: `Property Type: ${property.property_type}, Price: ${property.price}`
                    });
                });
            })
            .catch(error => console.error('Error:', error));
        }
    </script>
</head>
<body>

    <h2>Interactive Map for Real Estate Listings</h2>
    <div id="map"></div>

</body>
</html>