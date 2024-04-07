<?php
// Database configuration
$host = "db"; // since we're using Docker, `db` is the service name in the docker-compose.yml
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create feedback table if not exists
$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);";
if (!$conn->query($sql)) {
    echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $conn->real_escape_string($_POST['user_id']);
    $message = $conn->real_escape_string($_POST['message']);

    // Insert feedback
    $sql = "INSERT INTO feedback (user_id, message) VALUES ('$user_id', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "Feedback submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Magazine's Financial Services Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e0f7fa;
            color: #006064;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header{
            background: #006064;
            color: #fff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #e0f7fa 3px solid;
        }
        header a{
            color: #fff;
            text-decoration: none;
            text-transform: uppercase;
            font-size: 16px;
        }
        footer {
            padding: 20px;
            margin-top: 20px;
            color: #ffffff;
            background-color: #006064;
            text-align: center;
            font-size: 14px;
        }
        form {
            margin-top: 20px;
        }
        input[type="text"], textarea {
            width: 100%;
            margin-bottom: 20px;
            padding: 10px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #006064;
            color: white;
            border: 0;
            cursor:pointer;
        }
        input[type="submit"]:hover {
            background-color: #004d40;
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <h1>Feedback Collection</h1>
        </div>
    </header>

    <div class="container">
        <form action="" method="POST">
            <label>User ID:</label>
            <input type="text" name="user_id" required>
            <label>Message:</label>
            <textarea name="message" required></textarea>
            <input type="submit" value="Submit Feedback">
        </form>
    </div>

    <footer>
        <p>Magazine's Financial Services &copy; 2023</p>
    </footer>
</body>
</html>

<?php $conn->close(); ?>