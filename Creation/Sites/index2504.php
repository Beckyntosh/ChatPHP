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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
password VARCHAR(60) NOT NULL,
premium_feature_access BOOLEAN DEFAULT false,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_DEFAULT);
    $premium_access = isset($_POST['premium_access']) ? 1 : 0;

    $sql = $conn->prepare("INSERT INTO users (username, password, premium_feature_access) VALUES (?, ?, ?)");
    $sql->bind_param("ssi", $username, $password, $premium_access);

    if ($sql->execute()) {
        echo "<div>Registration successful!</div>";
    } else {
        echo "<div>Error: " . $sql->error . "</div>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Premium File Storage Features</title>
</head>
<body>

<h2>Sign Up</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
  Username: <input type="text" name="username" required>
  <br><br>
  Password: <input type="password" name="password" required>
  <br><br>
  Premium Access: <input type="checkbox" name="premium_access">
  <br><br>
  <input type="submit" name="submit" value="Sign Up">  
</form>

</body>
</html>
