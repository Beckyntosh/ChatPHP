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

// Create profiles table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS profiles (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
favorite_color VARCHAR(30),
favorite_office_supply VARCHAR(50),
bio TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($createTableQuery) === TRUE) {
  echo ""; // Output nothing on success
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $favorite_color = $_POST['favorite_color'];
    $favorite_office_supply = $_POST['favorite_office_supply'];
    $bio = $_POST['bio'];

    $stmt = $conn->prepare("INSERT INTO profiles (username, favorite_color, favorite_office_supply, bio) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $favorite_color, $favorite_office_supply, $bio);

    if ($stmt->execute()) {
        echo "<p>Profile Updated Successfully!</p>";
    } else {
        echo "<p>Error: " . $stmt->error . "</p>";
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile Setup</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f0f0f0; color: #333; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input[type=text], textarea { width: 100%; padding: 8px; margin: 10px 0; display: inline-block; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        input[type=submit] { width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Customize Your Profile</h2>
    <form action="" method="post">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>

        <label for="favorite_color">Favorite Color</label>
        <input type="text" id="favorite_color" name="favorite_color">

        <label for="favorite_office_supply">Favorite Office Supply</label>
        <input type="text" id="favorite_office_supply" name="favorite_office_supply">

        <label for="bio">Bio</label>
        <textarea id="bio" name="bio"></textarea>

        <input type="submit" value="Update Profile">
    </form>
</div>
</body>
</html>
