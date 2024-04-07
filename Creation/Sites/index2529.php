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

// Create events table
$eventsTable = "CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    event_name VARCHAR(50) NOT NULL,
    description TEXT,
    event_date DATE NOT NULL,
    reg_date TIMESTAMP
)";

if ($conn->query($eventsTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Create volunteers table
$volunteersTable = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    event_id INT(6) UNSIGNED,
    registration_date TIMESTAMP,
    FOREIGN KEY (event_id) REFERENCES events(id)
)";

if ($conn->query($volunteersTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Prepare and bind
  $stmt = $conn->prepare("INSERT INTO volunteers (full_name, email, phone, event_id) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("sssi", $fullName, $email, $phone, $eventId);

  // Set parameters and execute
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $eventId = $_POST['eventId'];
  $stmt->execute();

  echo "New records created successfully";
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-Up</title>
</head>
<body>
    <h1>Volunteer Sign-Up for Events</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="fullName">Full Name:</label><br>
        <input type="text" id="fullName" name="fullName" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone"><br>
        <label for="eventId">Event ID:</label><br>
        <input type="number" id="eventId" name="eventId" required><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
