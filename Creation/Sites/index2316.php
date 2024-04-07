<?php
// Initialize the session
session_start();

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

// Create users table if not exists
$usersTable = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
password VARCHAR(50),
loyalty_member BOOLEAN DEFAULT FALSE,
reg_date TIMESTAMP
)";

if ($conn->query($usersTable) === TRUE) {
  // echo "Table Users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle user registration
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstname = $_POST['firstname'];
  $lastname = $_POST['lastname'];
  $email = $_POST['email'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $loyalty_member = isset($_POST['loyalty_member']) ? 1 : 0;

  $stmt = $conn->prepare("INSERT INTO users (firstname, lastname, email, password, loyalty_member) VALUES (?, ?, ?, ?, ?)");
  $stmt->bind_param("ssssi", $firstname, $lastname, $email, $password, $loyalty_member);
  
  if ($stmt->execute()) {
    // Registration success
    echo "<script>alert('Registration successful! Welcome to our Vinyl Records Club.');</script>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Vinyl Records Membership</title>
  <style>
    body {
      font-family: 'Arial', sans-serif;
      background-color: #121212;
      color: #f39c12;
      text-align: center;
    }
    .container {
      width: 400px;
      margin: auto;
    }
    input[type=text], input[type=password], input[type=email] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    button {
      background-color: #f39c12;
      color: white;
      padding: 14px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
    }
    button:hover {
      opacity: 0.8;
    }
  </style>
</head>

<body>

  <div class="container">
    <h2>Join Our Vinyl Records Loyalty Program</h2>
    <p>Sign up now and enjoy exclusive benefits for our loyal members!</p>

    <form method="POST" action="">
      <label for="firstname">First Name:</label>
      <input type="text" id="firstname" name="firstname" required>
      <label for="lastname">Last Name:</label>
      <input type="text" id="lastname" name="lastname" required>
      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required>
      <label>
        <input type="checkbox" name="loyalty_member" checked> Sign up for the loyalty program
      </label>
      <button type="submit">Sign Up</button>
    </form>
  </div>

</body>

</html>
