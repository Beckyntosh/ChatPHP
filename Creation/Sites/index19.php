<?php
// Connection to the database
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

// Create the routes table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    start_point VARCHAR(50) NOT NULL,
    end_point VARCHAR(50) NOT NULL,
    mode_of_transport VARCHAR(50),
    cost DOUBLE,
    duration TIME,
    accessibility_options VARCHAR(255),
    departure_time DATETIME,
    arrival_time DATETIME
)";

if ($conn->query($sql) === TRUE) {
  echo "Table routes created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Frontend - HTML form
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Public Transport Route Search</title>
<style>
    body { font-family: Arial, sans-serif; background-color: #ffcf34; color: #333; }
    .container { max-width: 800px; margin: auto; padding: 20px; }
    .search-form { margin-bottom: 20px; }
    .search-results { margin-top: 20px; }
    table { width: 100%; border-collapse: collapse; }
    th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
</style>
</head>
<body>
<div class="container">
    <h2>Search for Public Transport Routes</h2>
    <form method="POST" class="search-form">
        <label for="start_point">Start:</label>
        <input type="text" id="start_point" name="start_point" required>

        <label for="end_point">End:</label>
        <input type="text" id="end_point" name="end_point" required>

        <label for="departure_time">Departure after:</label>
        <input type="datetime-local" id="departure_time" name="departure_time" required>

        <input type="submit" value="Search">
    </form>

<?php
// PHP Backend - Handle form submission and query the database
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $start_point = $_POST['start_point'];
    $end_point = $_POST['end_point'];
    $departure_time = $_POST['departure_time'];

    // SQL to search for routes
    $sql = $conn->prepare("SELECT * FROM routes WHERE start_point=? AND end_point=? AND departure_time >= ? ORDER BY departure_time ASC");
    $sql->bind_param("sss", $start_point, $end_point, $departure_time);
    $sql->execute();
    $result = $sql->get_result();

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<div class='search-results'><table><tr><th>Start Point</th><th>End Point</th><th>Mode</th><th>Cost</th><th>Duration</th><th>Accessibility</th><th>Departure Time</th><th>Arrival Time</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["start_point"]."</td><td>".$row["end_point"]."</td><td>".$row["mode_of_transport"]."</td><td>".$row["cost"]."</td><td>".$row["duration"]."</td><td>".$row["accessibility_options"]."</td><td>".$row["departure_time"]."</td><td>".$row["arrival_time"]."</td></tr>";
        }
        echo "</table></div>";
    } else {
        echo "0 results found";
    }
}
?>

</div>
</body>
</html>

<?php
$conn->close();
?>