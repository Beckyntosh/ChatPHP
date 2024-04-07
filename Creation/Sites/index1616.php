<?php
// Simple Virtual Event Calendar for a Virtual Book Club Meeting with capacity details

// Database connection settings
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt MySQL server connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create events table if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    event_name VARCHAR(50) NOT NULL,
    event_date DATE NOT NULL,
    capacity INT NOT NULL,
    registered INT DEFAULT 0,
    registration_open TINYINT(1) NOT NULL DEFAULT 1,
    UNIQUE KEY unique_event_date (event_date),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($createTable)) {
    die("Error creating table: " . $conn->error);
}

// Function to sanitize data
function clean_data($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = clean_data($_POST['event_name']);
    $event_date = clean_data($_POST['event_date']);
    $capacity = clean_data($_POST['capacity']);

    // Insert event into database
    $sql = "INSERT INTO events (event_name, event_date, capacity) VALUES (?, ?, ?)";

    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("ssi", $event_name, $event_date, $capacity);

        if ($stmt->execute()) {
            echo "<script>alert('Event added successfully!'); window.location.href=window.location.href;</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        table { width: 100%; margin-top: 20px; border-collapse: collapse; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        th { background-color: #f2f2f2; }
        form { margin-top: 20px; }
        input[type="text"], input[type="date"], input[type="number"] { width: 100%; padding: 10px; margin: 10px 0; }
        input[type="submit"] { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; cursor: pointer; width: 100%; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Virtual Book Club Meeting Calendar</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="event_name">Event Name:</label><br>
            <input type="text" id="event_name" name="event_name" required><br>
            <label for="event_date">Event Date:</label><br>
            <input type="date" id="event_date" name="event_date" required><br>
            <label for="capacity">Capacity:</label><br>
            <input type="number" id="capacity" name="capacity" required><br>
            <input type="submit" value="Add Event">
        </form>
    </div>
</body>
</html>
