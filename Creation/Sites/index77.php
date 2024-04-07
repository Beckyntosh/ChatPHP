<?php
// Simple travel destination search application
// Initialize database connection variables
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS Destinations (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  latitude DECIMAL(10, 8) NOT NULL,
  longitude DECIMAL(11, 8) NOT NULL,
  description TEXT,
  reg_date TIMESTAMP
)";
$conn->query($tableCreationQuery);

// Check for search request
$search = isset($_GET['search']) ? $_GET['search'] : '';

// HTML and JS for frontend
?>
<!DOCTYPE html>
<html>
<head>
    <title>Travel Destination Search</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_GOOGLE_MAPS_API_KEY&callback=initMap&libraries=&v=weekly" defer></script>
    <script>
    let map;
    function initMap() {
        map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: -34.397, lng: 150.644 },
          zoom: 8,
        });
    }
    </script>
    <style>
        #map { height: 400px; width: 100%; }
    </style>
</head>
<body>
    <h1>Travel Destination Search</h1>
    <form method="GET">
        <input type="text" name="search" placeholder="Search for destinations">
        <input type="submit" value="Search">
    </form>
    <div id="map"></div>
    <ul>
        <?php
        // Search and display destinations
        if (!empty($search)) {
            $stmt = $conn->prepare("SELECT name, latitude, longitude, description FROM Destinations WHERE name LIKE ?");
            $searchParam = "%".$search."%";
            $stmt->bind_param("s", $searchParam);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<li><strong>" . $row["name"]. "</strong> - " . $row["description"]. "</li>";
                    echo "<script>new google.maps.Marker({position: {lat: " . $row["latitude"] . ", lng: " . $row["longitude"] . "}, map: map});</script>";
                }
            } else {
                echo "<li>No results found</li>";
            }
        }
        ?>
    </ul>
</body>
</html>
<?php
$conn->close();
?>