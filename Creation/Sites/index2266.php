<?php
// Connection variables
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

// Create table for user preferences if not exists
$sql = "CREATE TABLE IF NOT EXISTS user_preferences (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id VARCHAR(30) NOT NULL,
favorite_color VARCHAR(30) NOT NULL,
favorite_brand VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // echo "Table user_preferences created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = htmlspecialchars($_POST['user_id']);
    $favorite_color = htmlspecialchars($_POST['favorite_color']);
    $favorite_brand = htmlspecialchars($_POST['favorite_brand']);

    $stmt = $conn->prepare("INSERT INTO user_preferences (user_id, favorite_color, favorite_brand) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $user_id, $favorite_color, $favorite_brand);
    
    if ($stmt->execute() === TRUE) {
        echo "<p style='color: green;'>Profile updated successfully!</p>";
    } else {
        echo "<p style='color: red;'>Error updating record: " . $conn->error . "</p>";
    }
    $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Setup</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f5f5f5; }
        .container { max-width: 600px; margin: 50px auto; padding: 20px; background-color: #fff; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        label { font-size: 18px; }
        input[type="text"], select { width: 100%; padding: 10px; margin: 8px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type="submit"] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type="submit"]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Profile Customization</h2>
    <form action="?" method="POST">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>

        <label for="favorite_color">Favorite Color:</label>
        <select id="favorite_color" name="favorite_color" required>
            <option value="">Select a Color</option>
            <option value="red">Red</option>
            <option value="blue">Blue</option>
            <option value="green">Green</option>
        </select>

        <label for="favorite_brand">Favorite Brand:</label>
        <input type="text" id="favorite_brand" name="favorite_brand" placeholder="E.g., Gucci">

        <input type="submit" value="Update Profile">
    </form>
</div>
</body>
</html>
