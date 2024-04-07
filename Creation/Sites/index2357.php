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

// If table does not exist, create it
$tableCheckQuery = "SHOW TABLES LIKE 'members'";
$tableExists = mysqli_query($conn, $tableCheckQuery);
if(mysqli_num_rows($tableExists) == 0) {
    $sql = "CREATE TABLE members (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
      echo "Table Members created successfully";
    } else {
      echo "Error creating table: " . $conn->error;
    }
}

// Handle user signup
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $insertQuery = "INSERT INTO members (fullname, email, password) VALUES ('$fullname', '$email', '$hashed_password')";

    if ($conn->query($insertQuery) === TRUE) {
        header("Location: welcome.php"); // Redirect user to a welcome page (implement the page on your own)
        exit;
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup for Exclusive Access</title>
Add your CSS styles here
</head>
<body>
    <div class="signup-container">
        <h2>Signup for Access to Exclusive Member-Only Content</h2>
        <form action="" method="post">
            <label for="fullname">Full Name:</label>
            <input type="text" id="fullname" name="fullname" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br><br>
            <input type="submit" value="Signup">
        </form>
    </div>
</body>
</html>
