<?php
// Define database connection parameters
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create comments table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle new comment submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["username"]) && isset($_POST["comment"])) {
    $username = htmlspecialchars($_POST["username"]);
    $comment = htmlspecialchars($_POST["comment"]);

    $stmt = $conn->prepare("INSERT INTO comments (username, comment) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $comment);

    if ($stmt->execute()) {
        echo "<p>Comment successfully added!</p>";
    } else {
        echo "<p>Error adding comment: " . $conn->error . "</p>";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Makeup Blog Comments</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffccff;
            color: #333;
            text-align: center;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        form {
            margin: 20px 0;
        }
        input[type="text"], textarea {
            width: 300px;
            margin: 10px 0;
            padding: 10px;
        }
        input[type="submit"] {
            background-color: #f2b6d2;
            border: none;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            font-size: 16px;
            cursor: pointer;
        }
        .comment {
            background-color: #ffe6ff;
            padding: 10px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Makeup Blog Comments</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <input type="text" name="username" placeholder="Your Name" required><br>
            <textarea name="comment" placeholder="Your Comment" rows="5" required></textarea><br>
            <input type="submit" value="Post Comment">
        </form>

        <?php
        // Retrieve and display all comments
        $sql = "SELECT username, comment, reg_date FROM comments ORDER BY reg_date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='comment'><p><strong>" . $row["username"]. "</strong> - " . $row["reg_date"]. "</p>";
                echo "<p>" . $row["comment"]. "</p></div>";
            }
        } else {
            echo "No comments yet. Be the first to comment!";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
