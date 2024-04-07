<?php
// Simple backend & frontend code for a signup form to receive notifications about new product updates
// for a skin care product website. Note: This is a basic example and not recommended for production without proper security measures.

// Database connection settings
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

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];
  
  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $emailErr = "Invalid email format";
  } else {
    $sql = "INSERT INTO subscribers (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
      echo "<div>Thank you for subscribing!</div>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }
}

// Create subscribers table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS subscribers (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Sign Up for Product Updates</title>
<style>
body { font-family: Arial, sans-serif; }
.form-container { margin: 20px; padding: 20px; border: 1px solid #ccc; }
input[type=email], input[type=submit] { padding: 10px; margin: 5px 0; width: 100%; box-sizing: border-box; }
</style>
</head>
<body>

<div class="form-container">
  <h2>Sign Up for Skin Care Product Updates</h2>
  <form action="" method="post">
    <label for="email">Enter your email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Subscribe">
  </form>
</div>

</body>
</html>

<?php
$conn->close();
?>
