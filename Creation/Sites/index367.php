<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
    // Database credentials
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

    // Sanitize and prepare data for insertion
    $email = $conn->real_escape_string($_POST['email']);

    // SQL to create table if it doesn't exist
    $sqlTable = "CREATE TABLE IF NOT EXISTS ProductUpdates (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(50) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if (!$conn->query($sqlTable)) {
        die("Error creating table: " . $conn->error);
    }

    // SQL to insert new record
    $sqlInsert = "INSERT INTO ProductUpdates (email) VALUES ('$email')";

    if ($conn->query($sqlInsert) === TRUE) {
        echo "You've successfully signed up for product updates.";
    } else {
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup for Product Update Notifications</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        input[type=email], button {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div>
    <form action="" method="post">
        <h2>Sign Up for Product Updates</h2>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <button type="submit" name="submit">Sign Up</button>
    </form>
</div>

</body>
</html>