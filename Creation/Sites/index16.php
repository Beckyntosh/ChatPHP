<?php
// Database connection setup
define("DB_SERVER", "db");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "root");
define("DB_DATABASE", "my_database");

// Create connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}

// Create table for routes if not exists
$routeTableSql = "CREATE TABLE IF NOT EXISTS routes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    mode_of_transport VARCHAR(30) NOT NULL,
    start_point VARCHAR(50),
    end_point VARCHAR(50),
    time TIME,
    cost DECIMAL(10, 2),
    accessibility_options VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($routeTableSql)) {
    echo "Error creating routes table: " . $conn->error;
}

// Insert some data into routes table
// For the sake of simplicity and privacy, I'm not adding an insertion script. Data should be managed by admin/backend processes.

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Public Transport Route Search</title>
<style>
body { font-family: Arial, sans-serif; }
/* Add your ephemeral style CSS */
</style>
</head>
<body>
<h2>Public Transport Route Search</h2>
<form method="post">
    <label for="mode_of_transport">Mode of Transport:</label>
    <select name="mode_of_transport" id="mode_of_transport">
        <option value="">Any</option>
        <option value="bus">Bus</option>
        <option value="train">Train</option>
        <option value="subway">Subway</option>
    </select><br><br>
    <label for="start_point">Start Point:</label>
    <input type="text" id="start_point" name="start_point"><br><br>
    <label for="end_point">End Point:</label>
    <input type="text" id="end_point" name="end_point"><br><br>
    <input type="submit" name="search" value="Search">
</form>

<?php
if (isset($_POST['search'])) {
    $mode_of_transport = $_POST['mode_of_transport'];
    $start_point = $_POST['start_point'];
    $end_point = $_POST['end_point'];

    $sql = "SELECT * FROM routes WHERE 1";
    
    if (!empty($mode_of_transport)) {
        $sql .= " AND mode_of_transport = '$mode_of_transport'";
    }
    if (!empty($start_point)) {
        $sql .= " AND start_point LIKE '%$start_point%'";
    }
    if (!empty($end_point)) {
        $sql .= " AND end_point LIKE '%$end_point%'";
    }

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Mode of Transport</th><th>Start</th><th>End</th><th>Time</th><th>Cost</th><th>Accessibility</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["mode_of_transport"]."</td><td>".$row["start_point"]."</td><td>".$row["end_point"]."</td><td>".$row["time"]."</td><td>".$row["cost"]."</td><td>".$row["accessibility_options"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
}
$conn->close();
?>
</body>
</html>