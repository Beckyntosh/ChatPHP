<?php
// Database Connection
$host = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the additional tables exist, if not create
$locationTableSql = "CREATE TABLE IF NOT EXISTS event_locations (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    address TEXT,
    capacity INT
);";

if (!$conn->query($locationTableSql)) {
    echo "Error creating table: " . $conn->error;
}

$search = $_GET['search'] ?? '';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Health and Wellness Products Event - Location Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff; /* AliceBlue */
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #e0ffff; /* LightCyan */
        }
        h1 {
            color: #2f4f4f; /* DarkSlateGray */
        }
        .location {
            padding: 10px;
            border: 1px solid #b0c4de; /* LightSteelBlue */
            margin-bottom: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Search Event Locations</h1>
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search locations..." value="<?= htmlspecialchars($search) ?>">
        <input type="submit" value="Search">
    </form>

    <?php
    if (!empty($search)) {
        $sql = "SELECT * FROM event_locations WHERE name LIKE ? OR address LIKE ?";
        $stmt = $conn->prepare($sql);
        $searchTerm = "%$search%";
        $stmt->bind_param("ss", $searchTerm, $searchTerm);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='location'>";
                echo "<h2>" . htmlspecialchars($row['name']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['address']) . "</p>";
                echo "<p>Capacity: " . htmlspecialchars($row['capacity']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>No locations found</p>";
        }
    }
    ?>
</div>

</body>
</html>
<?php
$conn->close();
?>