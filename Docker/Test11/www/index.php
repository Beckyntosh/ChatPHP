// PARAMETERS: Function: Subscription Service Signup with Trial Period: create an example signup process with a free trial for subscription sample application. Example: User signs up for a streaming service with a 1-month free trial Product: Groceries Style: medieval
<?php
// Connect to database
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

// Create tables if not exists
$sqlUsers = "CREATE TABLE IF NOT EXISTS users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  trial_start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  trial_end_date DATETIME,
  reg_date TIMESTAMP
)";

$sqlSubscriptions = "CREATE TABLE IF NOT EXISTS subscriptions (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) UNSIGNED,
  status VARCHAR(30) NOT NULL DEFAULT 'trial',
  start_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  end_date DATETIME,
  FOREIGN KEY (user_id) REFERENCES users(id)
)";

if ($conn->query($sqlUsers) === TRUE && $conn->query($sqlSubscriptions) === TRUE) {
  // Tables created successfully
} else {
  echo "Error creating tables: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $trial_end_date = date('Y-m-d H:i:s', strtotime('+1 month'));
  
  $sql = "INSERT INTO users (username, email, trial_end_date) VALUES (?, ?, ?)";
  
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("sss", $username, $email, $trial_end_date);
  
  if ($stmt->execute()) {
    $last_id = $conn->insert_id;
    $sqlSubscription = "INSERT INTO subscriptions (user_id, end_date) VALUES (?, ?)";
    $stmtSub = $conn->prepare($sqlSubscription);
    $stmtSub->bind_param("is", $last_id, $trial_end_date);
    
    if($stmtSub->execute()) {
      echo "User registered successfully. Enjoy your 1-month free trial!";
    } else {
      echo "Error: " . $sqlSubscription . "<br>" . $conn->error;
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  
  $stmt->close();
  $stmtSub->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Medieval Groceries Signup</title>
<style>
  body {
    font-family: 'Times New Roman', Times, serif;
    background-color: #f4eee8;
    color: #3e4c59;
    text-align: center;
  }
  input[type=text], input[type=email], input[type=submit] {
    padding: 10px;
    margin: 10px;
    border-radius: 5px;
    border: 1px solid #3e4c59;
  }
  input[type=submit] {
    cursor: pointer;
    background-color: #8a7f70;
    color: white;
  }
</style>
</head>
<body>
<h2>Sign up for a 1-month free trial!</h2>

<form method="post">
  <input type="text" name="username" placeholder="Username" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="submit" value="Sign Up">
</form>
</body>
</html>
