<?php
// Check if the request is for handling a form submission.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database configuration
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
    
    // Create the events table if it doesn't exist
    $sql = "CREATE TABLE IF NOT EXISTS virtual_events (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            description TEXT,
            start_date DATETIME,
            capacity INT,
            digital_features TEXT,
            UNIQUE(name)
    )";
    
    if (!$conn->query($sql) === TRUE) {
        die("Error creating table: " . $conn->error);
    }

    // Sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $description = $conn->real_escape_string($_POST['description']);
    $start_date = $conn->real_escape_string($_POST['start_date']);
    $capacity = (int)$_POST['capacity'];
    $digital_features = $conn->real_escape_string($_POST['digital_features']);
    
    // Insert the form data into the database
    $sql = "INSERT INTO virtual_events (name, description, start_date, capacity, digital_features) VALUES ('$name', '$description', '$start_date', $capacity, '$digital_features')";

    if (!$conn->query($sql) === TRUE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    } else {
        echo "<p>Event created successfully!</p>";
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Virtual Event</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; }
        .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        h2 { color: #333; }
        label { display: block; margin: 10px 0; }
        input[type="text"], input[type="datetime-local"], input[type="number"], textarea { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }
        input[type="submit"] { background-color: #007BFF; color: white; padding: 10px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #0056b3; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Create a New Virtual Event</h2>
        <form action="" method="post">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required>
            
            <label for="description">Event Description:</label>
            <textarea id="description" name="description" required></textarea>
            
            <label for="start_date">Start Date and Time:</label>
            <input type="datetime-local" id="start_date" name="start_date" required>
            
            <label for="capacity">Capacity:</label>
            <input type="number" id="capacity" name="capacity" min="1" required>
            
            <label for="digital_features">Digital Features:</label>
            <textarea id="digital_features" name="digital_features" required></textarea>
            
            <input type="submit" value="Create Event">
        </form>
    </div>
</body>
</html>