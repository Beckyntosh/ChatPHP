<?php
// Database Connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create Itinerary Table
$itinerarySql = "CREATE TABLE IF NOT EXISTS itinerary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    destination VARCHAR(50) NOT NULL,
    accommodations VARCHAR(255),
    activities VARCHAR(255),
    travel_date DATE,
    return_date DATE,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($itinerarySql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert Itinerary
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destination = $_POST['destination'];
    $accommodations = $_POST['accommodations'];
    $activities = $_POST['activities'];
    $travel_date = $_POST['travel_date'];
    $return_date = $_POST['return_date'];

    $stmt = $conn->prepare("INSERT INTO itinerary (destination, accommodations, activities, travel_date, return_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $destination, $accommodations, $activities, $travel_date, $return_date);
    if ($stmt->execute() === TRUE) {
        echo "<script>alert('New itinerary added successfully!');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $stmt->close();
}

$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Travel Itinerary Planner</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 100%; max-width: 600px; margin: auto; }
        form { display: flex; flex-direction: column; }
        input, textarea { margin-bottom: 20px; padding: 10px; }
        input[type="date"] { padding: 9px; }
        input[type="submit"] { background-color: #4CAF50; color: white; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
        h2 { text-align: center; }
     </style>
</head>
<body>
    <div class="container">
        <h2>Create Your Travel Itinerary</h2>
        <form action="" method="post">
            <input type="text" name="destination" required placeholder="Destination">
            <textarea name="accommodations" rows="4" placeholder="Accommodations"></textarea>
            <textarea name="activities" rows="4" placeholder="Activities"></textarea>
            <input type="date" name="travel_date" required>
            <input type="date" name="return_date" required>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>