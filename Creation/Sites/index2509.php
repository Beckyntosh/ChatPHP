<?php
// Define SQL connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to the database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $preferred_language = $_POST['preferred_language'];

    // Insert into the database
    try {
        $sql = "INSERT INTO users (username, preferred_language) VALUES (:username, :preferred_language)";
        $stmt = $pdo->prepare($sql);
        
        // Bind parameters
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':preferred_language', $preferred_language, PDO::PARAM_STR);
        
        $stmt->execute();
        echo "Account created successfully.";
    } catch (PDOException $e) {
        die("ERROR: Could not execute $sql. " . $e->getMessage());
    }
    
    unset($pdo);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Signup Page</title>
    <style>
        body {font-family: Arial, sans-serif;}
        .signup-container {max-width: 400px; margin: auto; padding: 20px;}
        .form-group {margin-bottom: 20px;}
        .form-group label {display: block;}
        .form-group input, .form-group select {width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; margin-top: 6px;}
        .submit-btn {width: 100%; background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; border-radius: 4px; cursor: pointer;}
        .submit-btn:hover {background-color: #45a049;}
    </style>
</head>
<body>

<div class="signup-container">
    <h2>Signup Page</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" name="username" id="username" required>
        </div>
        
        <div class="form-group">
            <label for="preferred_language">Preferred Language:</label>
            <select name="preferred_language" id="preferred_language" required>
                <option value="English">English</option>
                <option value="Spanish">Spanish</option>
                <option value="French">French</option>
                <option value="German">German</option>
Add other languages as needed
            </select>
        </div>
        
        <input type="submit" class="submit-btn" value="Sign Up">
    </form>
</div>

</body>
</html>
