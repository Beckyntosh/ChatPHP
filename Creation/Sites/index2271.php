<?php
// Connect to database
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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $favoriteGenre = mysqli_real_escape_string($conn, $_POST['favoriteGenre']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    // Insert into database
    $sql = "INSERT INTO UserProfile (username, favoriteGenre, email) VALUES ('$username', '$favoriteGenre', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile Setup</title>
</head>
<body>
    <h2>Customize Your Profile</h2>
    <form method="POST" action="">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br>
        
        <label for="favoriteGenre">Favorite DVD Genre:</label><br>
        <select id="favoriteGenre" name="favoriteGenre" required>
            <option value="Action">Action</option>
            <option value="Comedy">Comedy</option>
            <option value="Drama">Drama</option>
            <option value="Fantasy">Fantasy</option>
            <option value="Horror">Horror</option>
            <option value="Mystery">Mystery</option>
            <option value="Romance">Romance</option>
            <option value="Thriller">Thriller</option>
        </select><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <input type="submit" value="Customize Profile">
    </form>
</body>
</html>
