<?php

//database connection
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
$sql = "CREATE TABLE IF NOT EXISTS newsletter_signup (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
token VARCHAR(50) NOT NULL,
confirmed BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; //Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

//Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
  $email = $_POST['email'];
  $token = bin2hex(random_bytes(25)); //generate unique token

  // insert data into the database
  $sql = $conn->prepare("INSERT INTO newsletter_signup (email, token) VALUES (?, ?)");
  $sql->bind_param("ss", $email, $token);
  
  if ($sql->execute()) {
    //Send email
    $to = $email;
    $subject = "Confirm your subscription";
    $message = "Please click on the link to confirm your subscription: http://" . $_SERVER['HTTP_HOST'] . "/?token=$token";
    $headers = "From: noreply@petsupplies.com";

    if (mail($to, $subject, $message, $headers)) {
      echo "Subscription successful! Please check your email to confirm.";
    } else {
      echo "Failed to send confirmation email.";
    }
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $sql->close();
}

// Confirm subscription
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
  $token = $_GET['token'];
  $sql = $conn->prepare("UPDATE newsletter_signup SET confirmed = 1 WHERE token = ?");
  $sql->bind_param("s", $token);

  if ($sql->execute()) {
    echo "Subscription confirmed!";
  } else {
    echo "Confirmation failed.";
  }

  $sql->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Supplies Newsletter Signup</title>
</head>
<body style="background-color: lavenderblush; font-family: Arial, sans-serif; text-align: center;">
    <h1 style="color: darkmagenta;">Pet Supplies Newsletter Signup</h1>
    <p style="color: darkslategray;">Join our newsletter for the latest updates on our pet supplies.</p>
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <input type="email" name="email" required placeholder="Enter your email" style="padding: 8px; width: 20%;">
        <button type="submit" style="padding: 8px; background-color: darkmagenta; color: white; border: none; cursor: pointer;">Subscribe</button>
    </form>
</body>
</html>
