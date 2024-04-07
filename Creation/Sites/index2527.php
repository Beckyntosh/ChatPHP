<?php
// Define database connection parameters
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

// Attempt to create the volunteers table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(30),
    event VARCHAR(100),
    reg_date TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
    //echo "Table Volunteers created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escape user inputs for security
    $fullname = $conn->real_escape_string($_POST['fullname']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $event = $conn->real_escape_string($_POST['event']);

    // Attempt insert query execution
    $sql = "INSERT INTO volunteers (fullname, email, phone, event) VALUES ('$fullname', '$email', '$phone', '$event')";
    if ($conn->query($sql) === TRUE) {
        echo "You have successfully signed up to volunteer. Thank you!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Volunteer Sign-up Platform</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px 0 rgba(0,0,0,0.2);
            max-width: 600px;
            margin: auto;
        }
        
        input[type=text], input[type=email], input[type=tel], select {
            width: 100%;
            padding: 15px;
            margin: 5px 0 20px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Volunteer Sign-Up</h2>
    <form action="" method="POST">
        <label for="fullname">Full Name</label>
        <input type="text" id="fullname" name="fullname" placeholder="Your name.." required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="Your email.." required>

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" placeholder="Your phone number.." required>

        <label for="event">Event</label>
        <select id="event" name="event" required>
            <option value="">Please select an event</option>
            <option value="Local Charity Event">Local Charity Event</option>
            <option value="Community Clean-Up">Community Clean-Up</option>
            <option value="Food Drive">Food Drive</option>
        </select>

        <input type="submit" value="Sign Up">
    </form>
</div>

</body>
</html>
