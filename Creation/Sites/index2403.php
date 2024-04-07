<?php
// Connect to Database
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

// Check if the table users doesn't exist, create it
if (!$conn->query("DESCRIBE users")) {
    $sql = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        password VARCHAR(30) NOT NULL,
        reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Check if the table browsing_history doesn't exist, create it
if (!$conn->query("DESCRIBE browsing_history")) {
    $sql = "CREATE TABLE browsing_history (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        user_id INT(6) UNSIGNED,
        product_id INT(6) UNSIGNED,
        view_date TIMESTAMP,
        FOREIGN KEY (user_id) REFERENCES users(id)
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table Browsing History created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// HTML and PHP Code for frontend
?>
<!DOCTYPE html>
<html>
<head>
    <title>Health and Wellness Products Recommendations</title>
    <style>
        body { font-family: Courier, monospace; }
        form { margin: 20px; }
        input[type=text], input[type=password] {
            font-family: Courier, monospace;
            margin: 10px 0;
            padding: 10px;
        }
        input[type=submit] {
            font-family: Courier, monospace;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php
// User Signup
if (isset($_POST['signup'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users (username, password)
    VALUES ('$username', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// User Login
if (isset($_POST['login'])) {
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Authenticate user
    $sql = "SELECT id FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['logged_in_user_id'] = $result->fetch_assoc()['id'];
        echo "Logged in successfully";
    } else {
        echo "Login failed";
    }
}

// Show Recommendations, just a simple fetch based on the view count in this example
if (isset($_SESSION['logged_in_user_id'])) {
    $userId = $_SESSION['logged_in_user_id'];
    echo "<h2>Product Recommendations</h2>";

    // Fetch products viewed by the user
    $sql = "SELECT product_id, COUNT(product_id) as views FROM browsing_history 
            WHERE user_id=$userId GROUP BY product_id ORDER BY views DESC LIMIT 5";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "Product ID: " . $row["product_id"]. " - Views: " . $row["views"]. "<br>";
        }
    } else {
        echo "No product recommendations";
    }
}
?>

<h2>Signup</h2>
<form action="" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="signup" value="Signup">
</form>

<h2>Login</h2>
<form action="" method="post">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="submit" name="login" value="Login">
</form>

</body>
</html>

<?php $conn->close(); ?>
