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

// Create subscription table if it doesn't exist
$table_sql = "CREATE TABLE IF NOT EXISTS subscribers (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              email VARCHAR(50) NOT NULL,
              token VARCHAR(32) NOT NULL,
              confirmed TINYINT(1) NOT NULL DEFAULT 0,
              reg_date TIMESTAMP
              )";

if ($conn->query($table_sql) === TRUE) {
  echo "Table subscribers created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $conn->real_escape_string($_POST['email']);
  $token = md5(uniqid(rand(), true));
  $sql = "INSERT INTO subscribers (email, token) VALUES ('$email', '$token')";

  if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    $confirm_link = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']."?id=".$last_id."&token=".$token;

    // Send email for confirmation
    $to = $email;
    $subject = 'Confirm Your Subscription';
    $message = 'Please click on this link to confirm your subscription: '.$confirm_link;
    mail($to, $subject, $message);
    echo "Check your email to confirm subscription.";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
} elseif (isset($_GET['id']) && isset($_GET['token'])) {
  $id = $conn->real_escape_string($_GET['id']);
  $token = $conn->real_escape_string($_GET['token']);

  // Verify email link
  $sql = "SELECT id FROM subscribers WHERE id='$id' AND token='$token' LIMIT 1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    $update_sql = "UPDATE subscribers SET confirmed=1 WHERE id='$id'";
    if ($conn->query($update_sql) === TRUE) {
      echo "Subscription confirmed!";
    } else {
      echo "Error updating record: " . $conn->error;
    }
  } else {
    echo "Invalid Confirmation link.";
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Newsletter Signup</title>
</head>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="email">Email:</label><br>
    <input type="email" id="email" name="email" required><br>
    <input type="submit" value="Subscribe">
</form>
</body>
</html>
