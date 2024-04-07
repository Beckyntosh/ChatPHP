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

// Attempt to create tables if they don't exist
$initSQL = file_get_contents("init.sql");
if (!$conn->multi_query($initSQL)) {
  echo "Error creating tables: " . $conn->error;
}

// Wait for multi_query to finish
do {
  if ($res = $conn->store_result()) {
    $res->free();
  }
} while ($conn->more_results() && $conn->next_result());

// Handle user login
$message = '';
if (isset($_POST['username']) && isset($_POST['password'])) {
  $username = $conn->real_escape_string($_POST['username']);
  $password = $conn->real_escape_string($_POST['password']);

  $sql = "SELECT * FROM users WHERE username = '$username'";
  
  $result = $conn->query($sql);
  
  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if ($password === $user['password']) { // For demonstration purposes, plain-text password match. In real world scenarios, use password hashing and verification.
      session_start();
      $_SESSION['user_id'] = $user['id'];
      $_SESSION['user_name'] = $user['name'];
      header('Location: welcome.php'); // Redirect to a Welcome page after successful login
      exit();
    } else {
      $message = 'Login Failed. Incorrect Username or Password.';
    }
  } else {
    $message = 'User Not Found.';
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Login - Home Decor Children's Educational Site</title>
  <style>
    body {
      background-color: #282a36;
      font-family: "Gothic A1", sans-serif;
      color: #f8f8f2;
    }
    .login-container {
      width: 300px;
      padding: 40px;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background: #44475a;
      text-align: center;
      border-radius: 10px;
      box-shadow: 0 15px 25px rgba(0, 0, 0, 0.5);
    }
    input[type="text"], input[type="password"] {
      width: 100%;
      padding: 10px;
      margin: 10px 0;
      border: none;
      background: #6272a4;
      color: #f8f8f2;
      border-radius: 5px;
    }
    input[type="submit"] {
      background-color: #50fa7b;
      color: #282a36;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      width: 100%;
      padding: 10px;
    }
  </style>
</head>
<body>

<div class="login-container">
  <h2>Login</h2>
  <form action="" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" value="Login">
  </form>
  <?php if ($message != ''): ?>
    <p><?php echo $message; ?></p>
  <?php endif; ?>
</div>

</body>
</html>