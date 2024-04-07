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

if(isset($_POST['reset-password'])) {
    $email = $_POST['email'];
    $new_password = sha1($_POST['new_password']);
    
    $sql = "UPDATE users SET password='$new_password' WHERE email='$email'";

    if ($conn->query($sql) === TRUE) {
        echo "Password changed successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Reset - Summer Perfumes</title>
  <style>
  body {
      background-image: url("summer-background.jpg");
      font-family: Arial, Helvetica, sans-serif;
  }
  form {
      max-width: 300px;
      margin: auto;
      border: 1px solid #f2f2f2;
      padding: 20px;
      background: #eeeeee;
  }
  </style>
</head>
<body>
  <form method="post">
    <h2>Reset Password</h2>
    <div>Email: <input type="email" name="email" required /></div>
    <div>New Password: <input type="password" name="new_password" required /></div>
    <button type="submit" name="reset-password">Reset Password</button>
  </form>
</body>
</html>