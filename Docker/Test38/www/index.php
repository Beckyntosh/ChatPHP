// PARAMETERS: Function: Volunteer Sign-up Platform for Events and Causes: create an example signup platform for volunteering at events and social causes. Example: User registers to volunteer at a local charity event Product: Books Style: interoperable
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
$sql = "CREATE TABLE IF NOT EXISTS VolunteerEvents (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
eventName VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
eventDate DATE NOT NULL,
registrantName VARCHAR(50),
registrantEmail VARCHAR(50),
registrationDate TIMESTAMP
)";
if ($conn->query($sql) === TRUE) {
  //echo "Table VolunteerEvents created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $eventName = $_POST['eventName'];
    $registrantName = $_POST['registrantName'];
    $registrantEmail = $_POST['registrantEmail'];
    $description = $_POST['description'];
    $eventDate = $_POST['eventDate'];

    $sql = "INSERT INTO VolunteerEvents (eventName, registrantName, registrantEmail, description, eventDate)
    VALUES ('$eventName', '$registrantName', '$registrantEmail', '$description', '$eventDate')";

    if ($conn->query($sql) === TRUE) {
        echo "<p>Thank you, $registrantName! You have successfully registered for $eventName.</p>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Volunteer Sign-up Platform for Events and Causes</title>
</head>
<body>
<h2>Register to Volunteer</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
    Event Name: <input type="text" name="eventName" required><br><br>
    Your Name: <input type="text" name="registrantName" required><br><br>
    Your Email: <input type="email" name="registrantEmail" required><br><br>
    Description of Event: <textarea name="description" required></textarea><br><br>
    Event Date: <input type="date" name="eventDate" required><br><br>
    <input type="submit" value="Register">
</form>
</body>
</html>
