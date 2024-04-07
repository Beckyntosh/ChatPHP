<?php
$mysql_root_pswd = 'root';
$mysql_db = 'my_database';
$servername = 'db';

// Creating a connection to the database
$conn = new mysqli($servername, 'root', $mysql_root_pswd, $mysql_db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$createTablesSql = "
CREATE TABLE IF NOT EXISTS PropertyTypes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Listings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT,
    price DECIMAL(10, 2) NOT NULL,
    property_type INT,
    latitude DECIMAL(10, 8),
    longitude DECIMAL(11, 8),
    CONSTRAINT fk_property_type FOREIGN KEY (property_type) REFERENCES PropertyTypes(id)
);";

if ($conn->multi_query($createTablesSql) === TRUE) {
    echo "Tables created successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Map Search</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css"/>
    <style>
        #map {
            height: 400px;
        }

        .filters {
            padding: 20px;
            background: #f5f5f5;
            border-radius: 8px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<div class="filters">
    <label for="propertyType">Property Type:</label>
    <select id="propertyType"></select>

    <label for="priceRange">Price Range:</label>
    <select id="priceRange">
        <option value="0-100000">Up to 100,000</option>
        <option value="100001-300000">100,001 to 300,000</option>
        <option value="300001-500000">300,001 to 500,000</option>
        <option value="500001-">500,001 and above</option>
    </select>

    <button onclick="filterListings()">Search</button>
</div>

<div id="map"></div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    const map = L.map('map').setView([51.505, -0.09], 13);
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
    }).addTo(map);

    function filterListings() {
        // Implement AJAX call to fetch filtered data based on selections and then update the map
    }

    $(document).ready(function() {
        // Populate property types dropdown, initialize map etc.
    });
</script>
</body>
</html>