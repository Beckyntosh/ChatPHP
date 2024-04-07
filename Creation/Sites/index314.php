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

// Attempt to create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS UserNotifications (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
email VARCHAR(50) NOT NULL,
order_updates BOOLEAN DEFAULT 1,
promotional_emails BOOLEAN DEFAULT 1,
new_product_info BOOLEAN DEFAULT 1,
reg_date TIMESTAMP
)";

if ($conn->query($tableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $orderUpdates = isset($_POST['order_updates']) ? 1 : 0;
    $promotionalEmails = isset($_POST['promotional_emails']) ? 1 : 0;
    $newProductInfo = isset($_POST['new_product_info']) ? 1 : 0;
    
    $stmt = $conn->prepare("INSERT INTO UserNotifications (email, order_updates, promotional_emails, new_product_info) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siii", $email, $orderUpdates, $promotionalEmails, $newProductInfo);
    
    if($stmt->execute()) {
        echo "Settings saved successfully!";
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
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .container { max-width: 400px; padding: 20px; }
        label { display: block; margin-top: 10px; }
        .submit-btn { margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Manage Email Notifications</h2>
    <form method="post" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <label><input type="checkbox" name="order_updates" checked> Order updates</label>
        <label><input type="checkbox" name="promotional_emails" checked> Promotional emails</label>
        <label><input type="checkbox" name="new_product_info" checked> New product information</label>
        
        <button type="submit" class="submit-btn">Save Settings</button>
    </form>
</div>

</body>
</html>