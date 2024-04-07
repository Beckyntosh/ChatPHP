<?php
// Database Configurations
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    
    // Prepare the SQL statement to avoid SQL injection
    $stmt = $conn->prepare("INSERT INTO service_ratings (rating, comment) VALUES (?, ?)");
    $stmt->bind_param("is", $rating, $comment);
    
    // Parameters binding and execution
    $rating = $_POST["rating"];
    $comment = $_POST["comment"];
    $stmt->execute();
    
    echo "<h4>Feedback Submitted Successfully. Thank you!</h4>";
    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Service Rating System</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0 auto; max-width: 600px; padding: 20px; }
        .container { margin-top: 20px; }
        label { display: block; margin-bottom: 5px; }
        textarea, select, input[type=submit] { width: 100%; margin-top: 5px; }
        textarea { height: 100px; }
    </style>
</head>
<body>
    <h2>Rate Our Customer Service</h2>
    <form action="" method="post">
        <div class="container">
            <label for="rating">Rating:</label>
            <select name="rating" id="rating" required>
                <option value="5">Excellent</option>
                <option value="4">Very Good</option>
                <option value="3">Good</option>
                <option value="2">Fair</option>
                <option value="1">Poor</option>
            </select>
        </div>
        <div class="container">
            <label for="comment">Comment:</label>
            <textarea name="comment" id="comment" required></textarea>
        </div>
        <div class="container">
            <input type="submit" value="Submit Feedback">
        </div>
    </form>
</body>
</html>

<?php
// Create table structure if it doesn't exist
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to create table
$sql = "CREATE TABLE IF NOT EXISTS service_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    rating INT(1) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    //echo "Table service_ratings created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();
?>
