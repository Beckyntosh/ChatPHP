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

// Attempt to create the table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(100) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $sql = $conn->prepare("INSERT INTO users (fullname, email, password) VALUES (?, ?, ?)");
  $sql->bind_param("sss", $fullname, $email, $password);

  if($sql->execute()) {
    echo "<p>Signup successful! Welcome to our premium cloud storage service.</p>";
  } else {
    echo "<p>Could not register user. Please try again.</p>";
  }
  
  $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Premium File Storage</title>
</head>
<body>

<h2>Signup for Access to Premium File Storage Features:</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <label for="fullname">Full Name:</label><br>
    <input type="text" id="fullname" name="fullname" required><br>
    
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    
    <input type="submit" value="Signup">
</form>

</body>
</html>
