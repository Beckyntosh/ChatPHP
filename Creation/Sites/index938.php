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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post variables
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (email, password) VALUES (?, ?)";

    $stmt = $conn->prepare($sql);
    
    // Bind parameters and execute
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<div>Registration successful! Welcome to Premium File Storage.</div>";
    } else {
        echo "<div>Something went wrong. Please try again.</div>";
    }

    $stmt->close();
}

// Creating table users if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
password VARCHAR(255) NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Signup for Premium File Storage - Skin Care Products Website</title>
<style>
  body {font-family: 'Times New Roman', Times, serif; background-color: #fff5ee; color: #800000;}
  .container {width: 300px; margin: 0 auto; padding: 20px;}
  input[type="email"], input[type="password"] {width: 100%; padding: 10px; margin: 10px 0;}
  input[type="submit"] {background-color: #800000; color: white; padding: 10px 15px; border: none; cursor: pointer;}
  input[type="submit"]:hover {background-color: #b22222;}
</style>
</head>
<body>
<div class="container">
  <h2>Signup for Premium Features</h2>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" required><br>
    <input type="submit" value="Signup">
  </form>
</div>
</body>
</html>
