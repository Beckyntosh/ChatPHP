<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create Connection
$conn = new mysqli($servername, $username, $password, $database);

// Check Connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get Search
$search_String = $_POST['search'];

// Check if Search String is Empty
if ($search_String == ""){
    echo "Please enter a name in the search box.";
    exit();
}

// Query
$sql = "SELECT * FROM hotels WHERE name LIKE'%".$search_String."%'";

$result = $conn->query($sql);

// Results
if ($result->num_rows > 0) {
    echo "<table><tr><th>Hotel Name</th><th>Location</th><th>Price</th></tr>";
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["name"]. "</td><td>" . $row["location"]. "</td><td>" . $row["price"]."</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>