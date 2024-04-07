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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS email_preferences (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    newsletter BOOL DEFAULT 1,
    product_updates BOOL DEFAULT 1,
    custom_notifications BOOL DEFAULT 1,
    reg_date TIMESTAMP
)";
if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $newsletter = isset($_POST['newsletter']) ? 1 : 0;
    $product_updates = isset($_POST['product_updates']) ? 1 : 0;
    $custom_notifications = isset($_POST['custom_notifications']) ? 1 : 0;

    // Insert or update user preferences
    $sql = "INSERT INTO email_preferences (email, newsletter, product_updates, custom_notifications) VALUES (?, ?, ?, ?)
            ON DUPLICATE KEY UPDATE newsletter=?, product_updates=?, custom_notifications=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siiiiii", $email, $newsletter, $product_updates, $custom_notifications, $newsletter, $product_updates, $custom_notifications);

    if ($stmt->execute()) {
        echo "Preferences updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Email Notification Settings</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #f5f5dc;
            padding: 20px;
        }
    </style>
</head>
<body>
    <h2>Sherlock Holmes Tablets Email Preferences</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="checkbox" id="newsletter" name="newsletter" value="1">
        <label for="newsletter">Subscribe to Newsletter</label><br>
        <input type="checkbox" id="product_updates" name="product_updates" value="1">
        <label for="product_updates">Receive Product Updates</label><br>
        <input type="checkbox" id="custom_notifications" name="custom_notifications" value="1">
        <label for="custom_notifications">Allow Custom Notifications</label><br><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
