<?php

// PHP code to interact with the database for a Volunteer Sign-Up Platform

// Connection Settings
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

// Handle the POST request from the form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $event = $_POST["event"];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO Volunteers (name, email, event) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $event);

    // Execute and check if successful
    if ($stmt->execute()) {
        echo "<p>Thank you for signing up, " . htmlspecialchars($name) . "!</p>";
    } else {
        echo "<p>There was an error in your signup. Please try again.</p>";
    }

    $stmt->close();
}

$conn->close();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-up</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 0 auto; }
        form { display: flex; flex-direction: column; width: 300px; }
        label { margin-top: 10px; }
        input, select { margin-top: 5px; }
        button { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Volunteer Sign-up for Events and Causes</h2>
        <form action="" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <label for="event">Select Event:</label>
            <select id="event" name="event" required>
                <option value="Local Charity Event">Local Charity Event</option>
Additional events can be added here
            </select>
            
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
