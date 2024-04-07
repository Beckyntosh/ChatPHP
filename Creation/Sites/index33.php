<?php
// Set connection variables
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

// Create tables if not exists
$sql = "CREATE TABLE IF NOT EXISTS properties (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_type VARCHAR(30) NOT NULL,
price DECIMAL(10, 2) NOT NULL,
neighborhood VARCHAR(50) NOT NULL,
latitude FLOAT(10, 6) NOT NULL,
longitude FLOAT(10, 6) NOT NULL,
reg_date TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  echo "Table Properties initialized successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Interactive Map Real Estate Search</title>
<style>
  #map {
    height: 400px;
    width: 100%;
  }
</style>
</head>
<body>
<h2>Interactive Real Estate Listings</h2>

<form id="searchForm">
  Property Type: <select name="property_type" id="property_type">
    <option value="">Any</option>
    <option value="House">House</option>
    <option value="Apartment">Apartment</option>
  </select>
  Price Range: <input type="number" name="min_price" id="min_price" placeholder="Min Price"> - <input type="number" name="max_price" id="max_price" placeholder="Max Price">
  Neighborhood Features: <input type="text" name="neighborhood" id="neighborhood" placeholder="e.g. near school">
  <button type="button" onclick="filterProperties()">Search</button>
</form>

<div id="map"></div>

<script>
async function filterProperties() {
  const formData = new FormData(document.getElementById('searchForm'));
  const response = await fetch('?', {
    method: 'POST',
    body: formData,
  });
  const data = await response.json();
  updateMap(data);
}

function initMap() {
  const map = new google.maps.Map(document.getElementById("map"), {
    zoom: 10,
    center: {lat: -34.397, lng: 150.644},
  });
  window.updateMap = (properties) => {
    properties.forEach(property => {
      new google.maps.Marker({
        position: {lat: property.latitude, lng: property.longitude},
        map,
        title: property.property_type,
      });
    });
  }
}

window.onload = function() {
  initMap();
  filterProperties(); // Load all properties initially
}
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&callback=initMap">
</script>
</body>
</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Collect input data
  $property_type = $_POST['property_type'] ?? '';
  $min_price = $_POST['min_price'] ?? 0;
  $max_price = $_POST['max_price'] ?? 999999999;
  $neighborhood = $_POST['neighborhood'] ?? '';

  // Prepare SQL query
  $stmt = $conn->prepare("SELECT * FROM properties WHERE price BETWEEN ? AND ?" .
                         ($property_type ? " AND property_type=?" : "") .
                         ($neighborhood ? " AND neighborhood LIKE ?" : ""));
  if ($property_type && $neighborhood) {
    $like_neighborhood = "%$neighborhood%";
    $stmt->bind_param("ddss", $min_price, $max_price, $property_type, $like_neighborhood);
  } elseif ($property_type) {
    $stmt->bind_param("dds", $min_price, $max_price, $property_type);
  } elseif ($neighborhood) {
    $like_neighborhood = "%$neighborhood%";
    $stmt->bind_param("dds", $min_price, $max_price, $like_neighborhood);
  } else {
    $stmt->bind_param("dd", $min_price, $max_price);
  }

  // Execute and get result
  $stmt->execute();
  $result = $stmt->get_result();
  $properties = [];
  while($row = $result->fetch_assoc()) {
    $properties[] = $row;
  }
  
  // Return JSON
  header('Content-Type: application/json');
  echo json_encode($properties);
  exit();
}
?>