// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Baby Products Style: futuristic
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

// Create table
$sql = "CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
email VARCHAR(50),
event VARCHAR(50) NOT NULL,
registration_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['name'];
  $email = $_POST['email'];
  $event = $_POST['event'];
  
  $stmt = $conn->prepare("INSERT INTO VolunteerEvents (name, email, event) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $name, $email, $event);
  
  if ($stmt->execute()) {
    echo "<p>Thank you for signing up, $name! You are now a volunteer for $event.</p>";
  } else {
    echo "<p>Sorry, there was an error. Please try again.</p>";
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
        body {
            font-family: Arial, sans-serif;
            background: #f0f0f0;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input, select, button {
            display: block;
            width: 100%;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up to Volunteer</h2>
        <form method="post" action="">
            <input type="text" name="name" placeholder="Your Name" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <select name="event" required>
                <option value="">Select Event</option>
                <option value="Local Charity Event">Local Charity Event</option>
                <option value="Beach Clean-up">Beach Clean-up</option>
                <option value="Book Drive">Book Drive</option>
            </select>
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
