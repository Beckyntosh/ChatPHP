<?php
// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection parameters
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

    // Retrieve form data
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $favorite_brand = mysqli_real_escape_string($conn, $_POST['favorite_brand']);
    $watch_style = mysqli_real_escape_string($conn, $_POST['watch_style']);
    $interests = mysqli_real_escape_string($conn, $_POST['interests']);

    // SQL to create table if not exists
    $sql = "CREATE TABLE IF NOT EXISTS UserProfile (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    user_id VARCHAR(30) NOT NULL,
    favorite_brand VARCHAR(50),
    watch_style VARCHAR(50),
    interests VARCHAR(255),
    reg_date TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        // Table created successfully or already exists
        // Insert user data
        $sql = "INSERT INTO UserProfile (user_id, favorite_brand, watch_style, interests) 
        VALUES ('$user_id', '$favorite_brand', '$watch_style', '$interests')";

        if ($conn->query($sql) === TRUE) {
            echo "Profile updated successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error creating table: " . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile Setup</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 500px; margin: auto; padding: 20px; }
        label { display: block; margin-top: 10px; }
        input, select { width: 100%; padding: 10px; margin-top: 5px; }
        button { padding: 10px 20px; margin-top: 10px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Customize Your Profile</h2>
    <form action="" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>

        <label for="favorite_brand">Favorite Watch Brand:</label>
        <input type="text" id="favorite_brand" name="favorite_brand">

        <label for="watch_style">Preferred Watch Style:</label>
        <select id="watch_style" name="watch_style">
            <option value="Casual">Casual</option>
            <option value="Sport">Sport</option>
            <option value="Luxury">Luxury</option>
        </select>

        <label for="interests">Interests (comma separated):</label>
        <input type="text" id="interests" name="interests">

        <button type="submit">Submit</button>
    </form>
</div>

</body>
</html>
