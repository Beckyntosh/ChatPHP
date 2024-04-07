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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = md5($_POST['password']); // simple hash for demonstration (Note: Consider stronger hashing algorithms for production)
    $joinLoyaltyProgram = isset($_POST['joinLoyalty']) ? 1 : 0;

    // Insert into users table
    $sql = "INSERT INTO users (name, email, password, joinLoyaltyProgram) VALUES ('$name', '$email', '$password', $joinLoyaltyProgram)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for Our Loyalty Program</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; background-color: #fff; border-radius: 8px; }
        input[type=text], input[type=email], input[type=password] { width: 100%; padding: 10px; margin: 10px 0; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { width: 100%; padding: 10px; margin: 10px 0; background-color: #5cb85c; color: #fff; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
        label { cursor: pointer; }
        .checkbox { margin-bottom: 20px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Join Our Loyalty Program</h2>
    <form method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        
        <div class="checkbox">
            <label><input type="checkbox" name="joinLoyalty" value="Yes"> Join the Loyalty Program</label>
        </div>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
