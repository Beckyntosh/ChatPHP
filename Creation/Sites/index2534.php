<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Sign-up Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type=text], input[type=email], select {
            padding: 10px;
            margin-top: 5px;
            border-radius: 5px;
            border: 1px solid #ddd;
            box-sizing: border-box; /* Added for consistency */
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 15px 20px;
            margin-top: 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Volunteer Sign-up Form</h2>
    <form action="" method="post">
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="event">Select Event:</label>
        <select id="event" name="event" required>
            <option value="">--Please choose an event--</option>
            <option value="charity">Local Charity Event</option>
            <option value="cleaning">Beach Cleaning</option>
            <option value="planting">Tree Planting Day</option>
        </select>
        
        <button type="submit" name="submit">Submit</button>
    </form>
</div>

<?php
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    event VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert data
if (isset($_POST['submit'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $event = $conn->real_escape_string($_POST['event']);
  
    $insert = "INSERT INTO volunteers (fullname, email, event) VALUES ('$name', '$email', '$event')";
  
    if ($conn->query($insert) === TRUE) {
        echo "<div style='background-color: #d4edda; padding: 10px; margin-top: 20px; border-left: 6px solid #28a745;'>New record created successfully</div>";
    } else {
        echo "<div style='background-color: #f8d7da; padding: 10px; margin-top: 20px; border-left: 6px solid #dc3545;'>Error: " . $insert . "<br>" . $conn->error . "</div>";
    }
}

$conn->close();
?>

</body>
</html>
