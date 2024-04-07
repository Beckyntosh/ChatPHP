<?php
// Define MySQL connection
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
$table = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo ""; // Silence is golden.
} else {
  echo ""; // Error creating table: " . $conn->error;
}

// Handle Post Request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $trial_start = date('Y-m-d');

  $sql = "INSERT INTO users (username, email, trial_start)
  VALUES ('$username', '$email', '$trial_start')";

  if ($conn->query($sql) === TRUE) {
    echo ""; // New record created successfully
  } else {
    echo ""; // Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up for Trial</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f0e4d7;
  color: #333;
  text-align: center;
}

form {
  background-color: #fff3e0;
  margin: auto;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 4px 6px rgba(0,0,0,0.1);
  width: 300px;
  display: block;
}

input[type=text], input[type=email] {
  width: calc(100% - 22px);
  padding: 10px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width: 100%;
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}
</style>
</head>
<body>

<h2>Sign Up for 1-Month Free Trial</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="username">Username</label>
  <input type="text" id="username" name="username" required>
  
  <label for="email">Email</label>
  <input type="email" id="email" name="email" required>
  
  <input type="submit" value="Sign Up">
</form>

</body>
</html>

<?php
$conn->close();
?>
