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

$sql = "CREATE TABLE IF NOT EXISTS email_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    promotion_emails BOOLEAN DEFAULT FALSE,
    news_emails BOOLEAN DEFAULT FALSE,
    update_emails BOOLEAN DEFAULT FALSE,
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table email_preferences created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $promotion_emails = isset($_POST['promotion_emails']) ? 1 : 0;
    $news_emails = isset($_POST['news_emails']) ? 1 : 0;
    $update_emails = isset($_POST['update_emails']) ? 1 : 0;

    $stmt = $conn->prepare("INSERT INTO email_preferences (email, promotion_emails, news_emails, update_emails) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $email, $promotion_emails, $news_emails, $update_emails);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Email Notification Settings</title>
</head>
<body>

<h2>Email Notification Settings</h2>

<form method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <br>
    <input type="checkbox" id="promotion_emails" name="promotion_emails">
    <label for="promotion_emails">Receive promotional emails</label>
    <br>
    <input type="checkbox" id="news_emails" name="news_emails">
    <label for="news_emails">Receive news emails</label>
    <br>
    <input type="checkbox" id="update_emails" name="update_emails">
    <label for="update_emails">Receive update emails</label>
    <br>
    <input type="submit" value="Submit">
</form>

</body>
</html>
