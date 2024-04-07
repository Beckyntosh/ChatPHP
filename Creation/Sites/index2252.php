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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS product_updates (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($table) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];

    $sql = "INSERT INTO product_updates (email) VALUES ('$email')";

    if ($conn->query($sql) === TRUE) {
      echo "You have successfully signed up for product updates!";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup for Product Update Notifications</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=email], button { width: 100%; padding: 10px; margin: 10px 0; }
        button { background-color: #4CAF50; color: white; border: none; cursor: pointer; }
        button:hover { opacity: 0.8; }
    </style>
</head>
<body>

<div class="container">
    <h2>Signup for Product Updates</h2>
    <p>Enter your email address to receive notifications about new Herbal Supplements.</p>
    <form action="" method="post">
        <input type="email" name="email" required="required" placeholder="Your Email Address">
        <button type="submit">Sign Up</button>
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>
