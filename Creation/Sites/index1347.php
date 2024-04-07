<?php
// Set up connection parameters
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

// Attempt to create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  appointment_type VARCHAR(30) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $appointment_type = $_POST['appointment_type'];

    $sql = "INSERT INTO patients (fullname, appointment_type)
    VALUES ('$fullname', '$appointment_type')";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Patient</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type="text"], select, button { width: 100%; padding: 10px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Add Patient for an Appointment</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="fullname">Full Name:</label><br>
            <input type="text" id="fullname" name="fullname" required><br>
            <label for="appointment_type">Appointment Type:</label><br>
            <select id="appointment_type" name="appointment_type" required>
                <option value="Dental Check-up">Dental Check-up</option>
                <option value="Routine Check-up">Routine Check-up</option>
                <option value="Vision Test">Vision Test</option>
                <option value="Hearing Test">Hearing Test</option>
            </select><br>
            <button type="submit">Add Patient</button>
        </form>
    </div>
</body>
</html>
