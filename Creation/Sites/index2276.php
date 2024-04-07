<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to the database
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

    // Escape user inputs for security
    $user_id = mysqli_real_escape_string($conn, $_POST['user_id']);
    $favorite_color = mysqli_real_escape_string($conn, $_POST['favorite_color']);
    $shirt_size = mysqli_real_escape_string($conn, $_POST['shirt_size']);
    $jeans_size = mysqli_real_escape_string($conn, $_POST['jeans_size']);
    $shoe_size = mysqli_real_escape_string($conn, $_POST['shoe_size']);
    $style_preference = mysqli_real_escape_string($conn, $_POST['style_preference']);

    // Attempt insert query execution
    $sql = "INSERT INTO UserProfile (user_id, favorite_color, shirt_size, jeans_size, shoe_size, style_preference) VALUES ('$user_id', '$favorite_color', '$shirt_size', '$jeans_size', '$shoe_size', '$style_preference')";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully.";
    } else {
        echo "ERROR: Could not able to execute $sql. " . $conn->error;
    }

    // Close connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile Setup</title>
</head>
<body>

<h2>Customize Your Profile</h2>

<form action="" method="post">
    <label for="user_id">User ID:</label><br>
    <input type="text" id="user_id" name="user_id" required><br>

    <label for="favorite_color">Favorite Color:</label><br>
    <input type="text" id="favorite_color" name="favorite_color" required><br>

    <label for="shirt_size">Shirt Size:</label><br>
    <select id="shirt_size" name="shirt_size">
        <option value="S">Small</option>
        <option value="M">Medium</option>
        <option value="L">Large</option>
        <option value="XL">Extra Large</option>
    </select><br>

    <label for="jeans_size">Jeans Size:</label><br>
    <input type="number" id="jeans_size" name="jeans_size" required><br>

    <label for="shoe_size">Shoe Size:</label><br>
    <input type="number" id="shoe_size" name="shoe_size" required><br>

    <label for="style_preference">Style Preference:</label><br>
    <input type="text" id="style_preference" name="style_preference"><br>

    <input type="submit" value="Update Profile">
</form>

</body>
</html>
