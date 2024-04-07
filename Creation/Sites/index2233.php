<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // MySQL connection parameters
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

    // Retrieve user input
    $email = $_POST['email'];
    $name = $_POST['name'];
    
    // Clean data to prevent SQL injection
    $email = $conn->real_escape_string($email);
    $name = $conn->real_escape_string($name);

    // Check if email already exists
    $checkEmailQuery = "SELECT email FROM users WHERE email = '".$email."'";
    $result = $conn->query($checkEmailQuery);

    if ($result->num_rows == 0) {
        
        // Insert user into database
        $sql = "INSERT INTO users (name, email) VALUES ('".$name."', '".$email."')";
        if ($conn->query($sql) === TRUE) {
            // User successfully created, generate coupon
            $couponCode = "WELCOME10"; // Change this to a dynamic generator if needed
            echo "Account created successfully. Use coupon <strong>" . $couponCode . "</strong> for a 10% discount on your first purchase.";

            // Optionally, insert coupon to a database or send it by email...
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Email already exists.";
    }

    $conn->close();
} else {
    ?>
<!DOCTYPE html>
<html>
<head>
    <title>Signup & Get a Coupon</title>
</head>
<body>
    <h2>Signup for Our Herbal Supplements Website</h2>
    <form action="" method="post">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>
        <input type="submit" name="submit" value="Signup & Get Coupon">
    </form>
</body>
</html>
<?php
    // Create tables if they don't exist
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "CREATE TABLE IF NOT EXISTS users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>
