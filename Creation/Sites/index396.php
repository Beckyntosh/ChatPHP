<?php

// Connect to the database
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

// Check if the table exists, if not, create it
$checkTable = "SELECT 1 FROM `users` LIMIT 1";
if (!$conn->query($checkTable)) {
    $createTable = "CREATE TABLE users (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30) NOT NULL,
        email VARCHAR(50),
        trial_start_date DATE,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";

    if ($conn->query($createTable) === TRUE) {
        //echo "Table users created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $trial_start_date = date('Y-m-d'); // Today's date for the start of the trial period

    $sql = "INSERT INTO users (username, email, trial_start_date) VALUES ('$username', '$email', '$trial_start_date')";

    if ($conn->query($sql) === TRUE) {
        $message = "Congratulations, ".$username."! You've signed up for a 1-month free trial!";
    } else {
        $message = "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toy Streaming Service Signup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffcc00;
            margin: 0;
            padding: 20px;
            color: #333333;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        input[type="text"], input[type="email"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #f44336;
            color: #ffffff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            font-size: 18px;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #ff5722;
        }
        .message {
            color: #008000;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Sign Up for a One-Month Free Trial!</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br>
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br>
            <input type="submit" value="Sign Up">
        </form>
        <?php
        if ($message != "") {
            echo "<div class='message'>" . $message . "</div>";
        }
        ?>
    </div>
</body>
</html>