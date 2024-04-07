<?php

// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not, create it
$checkTable = "SELECT 1 FROM historical_weather LIMIT 1";
if ($conn->query($checkTable) === FALSE) {
    $createTable = "CREATE TABLE historical_weather (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    location VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    temperature DECIMAL(5,2) NOT NULL,
    humidity DECIMAL(5,2) NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table historical_weather created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $location = $_POST['location'];
    $date = $_POST['date'];

    // Query the database
    $stmt = $conn->prepare("SELECT * FROM historical_weather WHERE location=? AND date=?");
    $stmt->bind_param("ss", $location, $date);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Historical Weather Data Search</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        input[type=text], input[type=date] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ddd; box-sizing: border-box; }
        input[type=submit] { background-color: #007bff; color: white; padding: 10px 20px; border: none; cursor: pointer; }
        input[type=submit]:hover { background-color: #0056b3; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        th, td { text-align: left; padding: 8px; border: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Search Historical Weather Data</h2>
        <form method="post">
            <label for="location">Location:</label>
            <input type="text" id="location" name="location" required>
            
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required>
            
            <input type="submit" value="Search">
        </form>

        <?php if (!empty($data)): ?>
        <table>
            <tr>
                <th>Location</th>
                <th>Date</th>
                <th>Temperature (°C)</th>
                <th>Humidity (%)</th>
            </tr>
            <?php foreach ($data as $row): ?>
            <tr>
                <td><?php echo $row['location']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['temperature']; ?></td>
                <td><?php echo $row['humidity']; ?></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</body>
</html>

<?php $conn->close(); ?>