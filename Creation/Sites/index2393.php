<?php
// Define MYSQL connection details
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_DATABASE', 'my_database');

// Attempt to connect to MySQL database
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

// Check connection
if($conn === false){
    die("ERROR: Could not connect. " . $conn->connect_error);
}

// Create volunteers table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS volunteers (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  event VARCHAR(100) NOT NULL,
  registration_date TIMESTAMP
)";

if(!$conn->query($createTableQuery)) {
    die("ERROR: Could not create table. " . $conn->error);
}

// Handle Volunteer Sign-up Form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $event = $_POST['event'];

    $insertQuery = "INSERT INTO volunteers (name, email, event) VALUES (?, ?, ?)";

    if($stmt = $conn->prepare($insertQuery)) {
        $stmt->bind_param("sss", $name, $email, $event);

        if($stmt->execute()) {
            echo "<p>Thank you for signing up as a volunteer!</p>";
        } else {
            echo "<p>Could not sign you up, Please try again.</p>";
        }

        $stmt->close();
    } else {
        echo "<p>Could not prepare statement.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Signup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; }
        input, select { width: 100%; padding: 10px; margin: 10px 0; }
        button { width: 100%; padding: 10px; background-color: #4CAF50; color: white; font-size: 16px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Volunteer Sign-up Form</h2>
    <form action="" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label for="event">Select Event:</label>
        <select id="event" name="event" required>
            <option value="">--Please choose an event--</option>
            <option value="Local Charity Event">Local Charity Event</option>
Add other options here
        </select>

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
<?php $conn->close(); ?>
