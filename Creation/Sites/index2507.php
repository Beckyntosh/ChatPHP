<?php
// Check if the user submitted the form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
    
    // Sanitize and prepare SQL statement
    $user_language = $conn->real_escape_string($_POST['language']);
    $user_email = $conn->real_escape_string($_POST['email']);
    $sql = "INSERT INTO users (email, preferred_language) VALUES ('$user_email', '$user_language')";
    
    // Attempt to execute SQL statement
    if ($conn->query($sql) === TRUE) {
        echo "New account created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Signup - Language Preference</title>
</head>
<body>
    <h2>Signup - Select your Language</h2>
    <form action="" method="post">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br>
        
        <label for="language">Preferred Language:</label><br>
        <select name="language" id="language" required>
            <option value="English">English</option>
            <option value="French">French</option>
            <option value="Spanish">Spanish</option>
            <option value="German">German</option>
            <option value="Chinese">Chinese</option>
        </select><br>
        
        <input type="submit" value="Signup">
    </form>
</body>
</html>
