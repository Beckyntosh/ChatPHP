<?php
// Database connection
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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(50) NOT NULL,
    preferences TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Registration Handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect post data
    $username = $conn->real_escape_string($_POST['username']);
    $password = password_hash($conn->real_escape_string($_POST['password']), PASSWORD_DEFAULT);
    $preferences = json_encode($_POST['preferences']); // Assuming preferences is an array

    // Insert data into the database
    $sql = "INSERT INTO users (username, password, preferences) VALUES ('$username', '$password', '$preferences')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
        }
        .form-wrap {
            width: 300px;
            padding: 20px;
            margin: 20px auto;
            background: #222;
            border-radius: 8px;
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group input, .input-group select, .input-group textarea {
            width: calc(100% - 20px);
            padding: 9px 10px;
            margin: 5px 0;
            display: block;
            border: none;
            border-radius: 5px;
        }
        .input-group label {
            display: block;
            margin-bottom: 5px;
        }
        button[type=submit] {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="form-wrap">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <div class="input-group">
            <label for="username">Username</label>
            <input type="text" name="username" required>
        </div>
        <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" required>
        </div>
        <div class="input-group">
            <label for="preferences">Preferences (Comma separated, e.g., Guitars,Drums,Pianos)</label>
            <textarea name="preferences"></textarea>
        </div>
        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>

