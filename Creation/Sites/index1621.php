

<?php

$mysql_host = 'db';
$mysql_username = 'root';
$mysql_password = 'root';
$mysql_database = 'my_database';

// Create connection
$conn = new mysqli($mysql_host, $mysql_username, $mysql_password, $mysql_database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS virtual_events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(30) NOT NULL,
    event_date DATE NOT NULL,
    max_capacity INT(10),
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP 
    )";

if (!$conn->query($table)) {
    echo "Error creating table: " . $conn->error;
}

// Handle post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $event_name = $_POST['event_name'];
    $event_date = $_POST['event_date'];
    $max_capacity = $_POST['max_capacity'];
    $description = $_POST['description'];

    $sql = "INSERT INTO virtual_events (event_name, event_date, max_capacity, description) VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssis", $event_name, $event_date, $max_capacity, $description);

    if ($stmt->execute()) {
        echo "New event created successfully";
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
    <title>Virtual Event Calendar</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f3f4f6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; }
        input[type=text], input[type=date], input[type=number] { width: 100%; padding: 12px 20px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        textarea { width: 100%; height: 150px; padding: 12px 20px; box-sizing: border-box; border: 2px solid #ccc; border-radius: 4px; background-color: #f8f8f8; font-size: 16px; resize: none; }
    </style>
</head>
<body>

<div class="container">
    <h2>Add Virtual Book Club Meeting</h2>
    <form action="" method="POST">
        <label for="event_name">Event Name:</label>
        <input type="text" id="event_name" name="event_name" required>

        <label for="event_date">Event Date:</label>
        <input type="date" id="event_date" name="event_date" required>

        <label for="max_capacity">Max Capacity:</label>
        <input type="number" id="max_capacity" name="max_capacity" required>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <input type="submit" value="Add Event">
    </form>
</div>

</body>
</html>

This code sets up a simple form to add a virtual book club meeting into a database and create the necessary table if it doesn't exist. Note that deploying and running PHP code requires a server environment (like Apache or Nginx) with PHP installed and a MySQL database. It is crucial to handle user inputs securely to avoid SQL injection or other forms of attacks, as well as secure database credentials for production environments.