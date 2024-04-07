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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS product_updates (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  // Table created successfully or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  // Insert user's email into the database
  $sql = "INSERT INTO product_updates (email) VALUES ('".$email."')";

  if ($conn->query($sql) === TRUE) {
    $signupSuccess = true;
  } else {
    $signupSuccess = false;
  }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Product Updates</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=email], button { padding: 10px; margin-top: 5px; width: 100%; box-sizing: border-box; }
        .success { background-color: #ddffdd; padding: 10px; margin-top: 15px; }
        .error { background-color: #ffdddd; padding: 10px; margin-top: 15px; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for Our Makeup Product Updates!</h2>

        <?php if (isset($signupSuccess)): ?>
            <?php if ($signupSuccess): ?>
                <div class="success">Thank you for signing up!</div>
            <?php else: ?>
                <div class="error">Sorry, there was an error. Please try again.</div>
            <?php endif; ?>
        <?php endif; ?>

        <form action="" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            
            <button type="submit">Sign Up</button>
        </form>
    </div>
</body>
</html>
<?php $conn->close(); ?>
