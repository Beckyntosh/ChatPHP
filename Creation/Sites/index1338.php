<?php
// This example code is simplified and should not be used as is in production environments.

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

// Create table if doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS patients (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  appointment_type VARCHAR(50) NOT NULL,
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ''; // In a production script, you might log this to a file.
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if request is post to add patient
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_POST['name'] ?: 'Jane Doe';
  $appointment_type = $_POST['appointment_type'] ?: 'dental check-up';

  $stmt = $conn->prepare("INSERT INTO patients (name, appointment_type) VALUES (?, ?)");
  $stmt->bind_param("ss", $name, $appointment_type);

  if ($stmt->execute()) {
    echo "New record created successfully";
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
  <title>Add Patient</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    form {
      display: flex;
      flex-direction: column;
      width: 300px;
      margin: auto;
    }
    input, button {
      margin: 10px 0;
    }
  </style>
</head>
<body>

<h2>Add Patient to Appointment System</h2>

<form action="" method="post">
  <label for="name">Patient Name:</label>
  <input type="text" id="name" name="name" placeholder="e.g., Jane Doe" required>
  
  <label for="appointment_type">Appointment Type:</label>
  <input type="text" id="appointment_type" name="appointment_type" placeholder="e.g., dental check-up" required>
  
  <button type="submit">Add Patient</button>
</form>

</body>
</html>
