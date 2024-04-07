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

// Create User Table if not exists
$userTable = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    password VARCHAR(50),
    reg_date TIMESTAMP
)";

if (!$conn->query($userTable)) {
    echo "Error creating table: " . $conn->error;
}

// Create Browsing History Table if not exists
$browsingHistoryTable = "CREATE TABLE IF NOT EXISTS browsing_history (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    viewed_on TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if (!$conn->query($browsingHistoryTable)) {
    echo "Error creating table: " . $conn->error;
}

// Check Signup Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signup'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $signupSql = "INSERT INTO users (email, password) VALUES ('$email', '$password')";

    if ($conn->query($signupSql) === TRUE) {
        echo "Signup successful. Redirecting to recommendations...";
        // Redirect to recommendations page
        header("Location: recommendations.php?user_id=".$conn->insert_id);
        exit();
    } else {
        echo "Error: " . $signupSql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Personalized Product Recommendations</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0db4f;
            color: #323330;
            text-align: center;
        }
        .container {
            max-width: 300px;
            margin: auto;
            padding: 20px;
        }
        input[type=email], input[type=password] {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #322f2f;
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
        <h2>Signup for Recommendations</h2>
        <form method="POST">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit" name="signup">Signup</button>
        </form>
    </div>
</body>
</html>