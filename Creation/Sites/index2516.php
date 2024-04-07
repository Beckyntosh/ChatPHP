<?php
// Connect to the database
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

// Create table for user preferences if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
preferred_language VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $username = $_POST['username'];
    $preferred_language = $_POST['preferred_language'];
    
    // Insert user preference into database
    $stmt = $conn->prepare("INSERT INTO user_preferences (username, preferred_language) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $preferred_language);
    
    if ($stmt->execute()) {
        echo "<p><b>Your preferences have been saved successfully!</b></p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kitchenware - Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        form {
            margin-top: 50px;
        }
        label, select, input[type="submit"] {
            font-size: 18px;
            padding: 10px;
        }
        input[type="submit"] {
            cursor: pointer;
            background-color: black;
            color: white;
            border: none;
        }
    </style>
</head>
<body>

<h2>Signup Form</h2>

<form method="post" action="">
  <label for="username">Username:</label><br>
  <input type="text" id="username" name="username" required><br><br>
  <label for="preferred_language">Preferred Language:</label><br>
  <select id="preferred_language" name="preferred_language" required>
    <option value="English">English</option>
    <option value="Spanish">Spanish</option>
    <option value="French">French</option>
    <option value="German">German</option>
Add other languages as needed
  </select><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
