<?php

// Define MySQL connection parameters
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

// Execute when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);

    // Check if user already exists
    $checkUser = "SELECT email FROM users WHERE email='$email'";
    $result = $conn->query($checkUser);

    if ($result->num_rows == 0) {
        $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully. You can now log in.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "User already exists.";
    }
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Sign Up for Exclusive Content</title>
</head>
<body>

<h2>Sign Up for Access to Exclusive Member-Only Fitness Equipment Content</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" required><br>
  
  <label for="email">Email:</label><br>
  <input type="email" id="email" name="email" required><br>
  
  <label for="password">Password:</label><br>
  <input type="password" id="password" name="password" required><br><br>
  
  <input type="submit" value="Sign Up">
</form> 

</body>
</html>
