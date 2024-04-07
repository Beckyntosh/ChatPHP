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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(50) NOT NULL,
    description TEXT NOT NULL,
    code TEXT NOT NULL,
    status ENUM('pending', 'reviewed') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

$conn->query($sql);

$sql = "CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    review_id INT(6) UNSIGNED,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (review_id) REFERENCES code_reviews(id)
)";

$conn->query($sql);

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $code = $_POST['code'];
  
    $stmt = $conn->prepare("INSERT INTO code_reviews (title, description, code) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $code);
    $stmt->execute();
    $stmt->close();

    echo "New code review submitted successfully";
}

// Retrieve all reviews
$sql = "SELECT * FROM code_reviews";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Code Review System</title>
</head>
<body>
    <h2>Submit Code for Review</h2>
    <form method="POST" action="">
        Title: <input type="text" name="title" required><br>
        Description: <textarea name="description" required></textarea><br>
        Code: <textarea name="code" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Code Reviews</h2>
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<h3>".$row["title"]."</h3>";
            echo "<p>".$row["description"]."</p>";
            echo "<pre>".$row["code"]."</pre>";
            echo "<hr>";
        }
    } else {
        echo "No reviews yet";
    }
    ?>
</body>
</html>
