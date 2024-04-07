<?php
// Initializing variables for connection
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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // Simple MD5 hash for password
    $join_loyalty_program = isset($_POST['join_loyalty_program']) ? 1 : 0;

    // Insert user into database
    $sql = "INSERT INTO users (name, email, password, join_loyalty_program) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssi", $name, $email, $password, $join_loyalty_program);
    
    if ($stmt->execute()) {
        echo "Registration successful!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bath Products Website Registration</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=text], input[type=password], input[type=email] {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        label {
            font-weight: bold;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
        input[type=checkbox] {
            margin-top: 15px;
        }
    </style>
</head>
<body>

<h2>Join Our Loyalty Program</h2>

<form method="POST" action="">

  <label for="name">Full Name</label>
  <input type="text" id="name" name="name" required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" required>
  
  <label for="psw">Password</label>
  <input type="password" id="psw" name="password" required>
  
  <label for="loyalty">Join Loyalty Program:</label>
  <input type="checkbox" id="loyalty" name="join_loyalty_program">

  <input type="submit" value="Sign Up">
</form>

</body>
</html>
