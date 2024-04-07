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

// Create table if it doesn't exist
$tableCheckQuery = "SELECT 1 FROM `notifications` LIMIT 1";
if ($conn->query($tableCheckQuery) === FALSE) {
    $createTableSql = "CREATE TABLE notifications (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($createTableSql) === TRUE) {
        echo "Table notifications created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO notifications (email) VALUES (?)");
    $stmt->bind_param("s", $email);
    
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
    <title>Sign Up for Product Updates</title>
</head>
<body>

<h2>Sign Up for Product Updates on Musical Instruments</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Email: <input type="email" name="email" required>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
