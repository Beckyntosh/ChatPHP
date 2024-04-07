<?php
// Assuming a single-file approach for simplicity. Ideally, this should be structured better.
// Database configuration variables
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Ensure review_table exists; Create if not.
try {
    $sql = "CREATE TABLE IF NOT EXISTS review_table (
        id INT AUTO_INCREMENT PRIMARY KEY,
        creator_name VARCHAR(255) NOT NULL,
        feature_name VARCHAR(255) NOT NULL,
        code_text TEXT NOT NULL,
        submission_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
    $pdo->exec($sql);
} catch (PDOException $e) {
    die("ERROR: Could not create table. " . $e->getMessage());
}

// Handle form submission for code review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['feature_name'], $_POST['creator_name'], $_POST['code_text'])) {
    try {
        $sql = "INSERT INTO review_table (creator_name, feature_name, code_text) VALUES (:creator_name, :feature_name, :code_text)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':creator_name', $_POST['creator_name'], PDO::PARAM_STR);
        $stmt->bindParam(':feature_name', $_POST['feature_name'], PDO::PARAM_STR);
        $stmt->bindParam(':code_text', $_POST['code_text'], PDO::PARAM_STR);
        
        // Execute the prepared statement
        $stmt->execute();
        echo "<script>alert('Code submitted successfully for review.');</script>";
    } catch (PDOException $e) {
        die("ERROR: Could not able to execute $sql. " . $e->getMessage());
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Kitchenware Code Review System</title>
Add thoughtful style considerations here
<style>
    body { font-family: Arial, sans-serif; background-color: #f3f4f6; padding: 20px; }
    .form-container { background-color: #ffffff; padding: 20px; border-radius: 5px; box-shadow: 0 2px 4px rgba(0,0,0,.1); }
    input[type="text"], textarea { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ddd; border-radius: 4px; box-sizing: border-box; }
    input[type="submit"] { background-color: #007bff; color: white; padding: 10px; border: none; border-radius: 4px; cursor: pointer; }
    input[type="submit"]:hover { background-color: #0056b3; }
</style>
</head>
<body>

<div class="form-container">
    <h2>Submit Code for Review</h2>
    <form action="" method="post">
        <label for="creator_name">Your Name:</label>
        <input type="text" id="creator_name" name="creator_name" required>

        <label for="feature_name">Feature Name:</label>
        <input type="text" id="feature_name" name="feature_name" required>

        <label for="code_text">Code:</label>
        <textarea id="code_text" name="code_text" rows="10" required></textarea>

        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
