<?php
// This script handles both the display and processing of the language learning content form.
// It's a simplified example and not ready for production without proper validation, sanitation, and security considerations.

// Define database credentials
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    // Set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e){
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Process form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $language = "Spanish";
    $level = "Beginner";
    $vocabulary = $_POST["vocabulary"]; // The vocabulary list as a comma-separated string

    // Prepare an insert statement
    $sql = "INSERT INTO language_content (language, level, vocabulary) VALUES (:language, :level, :vocabulary)";
 
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(":language", $language, PDO::PARAM_STR);
        $stmt->bindParam(":level", $level, PDO::PARAM_STR);
        $stmt->bindParam(":vocabulary", $vocabulary, PDO::PARAM_STR);
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            echo "<p>Record inserted successfully.</p>";
        } else{
            echo "<p>Oops! Something went wrong. Please try again later.</p>";
        }

        // Close statement
        unset($stmt);
    }
}

// Close connection
unset($pdo);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Spanish Vocabulary for Beginners</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; padding: 20px; margin: auto; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Add Spanish Vocabulary for Beginners</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <label>Vocabulary List (comma-separated)</label>
                <textarea name="vocabulary" rows="5" required></textarea>
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>
</body>
</html>

Note: While this code provides a simple example, it's always important to consider security practices such as data validation, sanitation, and protection against SQL injection when developing web applications. Also, for a real-world application, separating concerns between logic and presentation (e.g., using an MVC framework) and implementing user authentication would be advisable.