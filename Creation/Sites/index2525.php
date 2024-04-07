<?php
// Set connection variables
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
$sql = "CREATE TABLE IF NOT EXISTS Volunteers (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullName VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    phoneNumber VARCHAR(15),
    event VARCHAR(50) NOT NULL,
    registrationDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Volunteers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullName = $_POST['fullName'];
  $email = $_POST['email'];
  $phoneNumber = $_POST['phoneNumber'] ?? '';
  $event = $_POST['event'];

  $stmt = $conn->prepare("INSERT INTO Volunteers (fullName, email, phoneNumber, event) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $fullName, $email, $phoneNumber, $event);
  
  if ($stmt->execute()) {
    echo "<div>Thanks for signing up, $fullName! You'll receive more information about the $event event soon.</div>";
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Sign-up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0ebe3;
            color: #333;
            text-align: center;
        }
        .container {
            background-color: #fffdf9;
            margin: auto;
            width: 50%;
            padding: 20px;
            border-radius: 15px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Volunteer Sign-up Form</h2>
        <form action="" method="POST">
            <label for="fullName">Full Name:</label>
            <input type="text" id="fullName" name="fullName" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="phoneNumber">Phone Number:</label>
            <input type="text" id="phoneNumber" name="phoneNumber">

            <label for="event">Select Event:</label>
            <select id="event" name="event" required>
                <option value="Local Charity Event">Local Charity Event</option>
                <option value="Community Clean-up">Community Clean-up</option>
                <option value="Food Bank Help">Food Bank Help</option>
                <option value="Other">Other</option>
            </select>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
