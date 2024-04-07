<?php
// Database connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Connect to MySQL database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create friends table if it doesn't exist
$createFriendsTable = "CREATE TABLE IF NOT EXISTS friends (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    friend_id INT,
    status ENUM('pending', 'confirmed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($createFriendsTable)) {
    echo "Error creating table: " . $conn->error;
}

// Add friend functionality
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["add_friend"])) {
    $userId = (int)$_POST["user_id"];
    $friendId = (int)$_POST["friend_id"];

    $addFriendQuery = "INSERT INTO friends (user_id, friend_id, status) VALUES (?, ?, 'pending')";

    // Prepare statement
    $stmt = $conn->prepare($addFriendQuery);
    $stmt->bind_param("ii", $userId, $friendId);

    if ($stmt->execute()) {
        echo "<script>alert('Friend request sent!')</script>";
    } else {
        echo "<script>alert('Failed to send friend request.')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organic Foods Portfolio - Add Friend</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background: #f4e8c1;
            color: #5d3a00;
        }
        .container {
            width: 80%;
            margin: auto;
            text-align: center;
        }
        h1 {
            color: #8c7044;
        }
        .btn {
            background-color: #8c7044;
            color: white;
            padding: 10px;
            border: none;
            cursor: pointer;
        }
        /* Retro revival theme styling */
        .retro-style {
            font-family: 'Courier New', Courier, monospace;
            background-color: #ffefcf;
            border: 2px dashed #8c7044;
            padding: 20px;
        }
    </style>
</head>
<body>

<div class="container retro-style">
    <h1>Add Friend</h1>
    <form method="POST">
Assuming logged in user ID is 1 for demonstration
        <label for="friend_id">Friend's User ID:</label>
        <input type="text" id="friend_id" name="friend_id" required>
        <button type="submit" class="btn" name="add_friend">Send Friend Request</button>
    </form>
</div>

</body>
</html>
<?php
$conn->close();
?>