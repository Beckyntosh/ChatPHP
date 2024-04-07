<?php
// Connection settings
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

// Check if tables exist, and if not, create them
$tableCheckSQL = "CREATE TABLE IF NOT EXISTS users (
                  id INT AUTO_INCREMENT PRIMARY KEY,
                  username VARCHAR(30) NOT NULL,
                  name VARCHAR(30) NOT NULL,
                  email VARCHAR(50) NOT NULL,
                  password VARCHAR(255) NOT NULL
                );";
$conn->query($tableCheckSQL);

session_start();

// Register User
if (isset($_POST['register'])) {
  $username = $_POST['username'];
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $query = "INSERT INTO users (username, name, email, password) VALUES ('$username', '$name', '$email', '$password')";
  if ($conn->query($query) === TRUE) {
    $_SESSION['username'] = $username;
    header('Location: welcome.php');
  } else {
    echo "Error: " . $query . "<br>" . $conn->error;
  }
}

// Login User
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $query = "SELECT * FROM users WHERE username='$username'";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
      $_SESSION['username'] = $username;
      header('Location: welcome.php');
    } else {
      echo "Invalid username or password";
    }
  } else {
    echo "User does not exist";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Digital Dreamscape - Book Food and Recipe Sharing Site</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #333;
            color: #ddd;
            text-align: center;
        }

        input[type=text], input[type=password] {
            margin: 10px 0;
            padding: 10px;
            width: 20%;
        }

        input[type=submit] {
            cursor: pointer;
            padding: 10px 15px;
            background: #575757;
            color: #fff;
            border: 0;
        }

        .container {
            margin-top: 100px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Login to Digital Dreamscape</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="login" value="Login">
    </form>

    <h2>Register</h2>
    <form action="" method="post">
        <input type="text" name="username" placeholder="Username" required><br>
        <input type="text" name="name" placeholder="Name" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Password" required><br>
        <input type="submit" name="register" value="Register">
    </form>
</div>

</body>
</html>

<?php
$conn->close();
?>