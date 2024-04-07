<?php
// DB Connection
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

// Create Email Notification Settings Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_notification_settings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50) NOT NULL,
    promotion BOOLEAN NOT NULL DEFAULT 1,
    new_product BOOLEAN NOT NULL DEFAULT 1,
    reminder BOOLEAN NOT NULL DEFAULT 1,
    modified TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if ($conn->query($sql) === TRUE) {
  echo "Table user_notification_settings created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"])){
    $email = $_POST["email"];
    $promotion = isset($_POST['promotion']) ? 1 : 0;
    $new_product = isset($_POST['new_product']) ? 1 : 0;
    $reminder = isset($_POST['reminder']) ? 1 : 0;

    // Check if user already exists
    $check = "SELECT id FROM user_notification_settings WHERE email = '$email'";
    $result = $conn->query($check);

    if($result->num_rows > 0){
        // Update
        $update = "UPDATE user_notification_settings SET promotion='$promotion', new_product='$new_product', reminder='$reminder' WHERE email='$email'";
        if($conn->query($update) === TRUE){
            echo "<br>Notification settings updated successfully.";
        } else{
            echo "<br>Error updating record: " . $conn->error;
        }
    } else{
        // Insert
        $insert = "INSERT INTO user_notification_settings (email, promotion, new_product, reminder) VALUES ('$email', '$promotion', '$new_product', '$reminder')";
        if ($conn->query($insert) === TRUE) {
            echo "<br>New record created successfully";
        } else {
            echo "<br>Error: " . $insert . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Email Notification Settings</title>
</head>
<body>
    <h2>Manage Your Email Notification Settings</h2>
    <form method="post" action="">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        <input type="checkbox" id="promotion" name="promotion" value="1">
        <label for="promotion"> Receive Promotions</label><br>
        <input type="checkbox" id="new_product" name="new_product" value="1">
        <label for="new_product"> New Product Alerts</label><br>
        <input type="checkbox" id="reminder" name="reminder" value="1">
        <label for="reminder"> Reminders</label><br><br>
        <input type="submit" value="Submit">
    </form> 
</body>
</html>