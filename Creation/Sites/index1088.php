<?php
// This script creates a simple fitness class rating system. It does everything in one file for simplicity, including setting up the database, displaying a form, saving ratings, and showing ratings.

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database credentials and connection
$dbHost = 'db';
$dbUser = 'root';
$dbPass = 'root';
$dbName = 'my_database';

$conn = new mysqli($dbHost, $dbUser, $dbPass, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create database and tables if they don't exist
$sql = "
CREATE DATABASE IF NOT EXISTS my_database;
USE my_database;

CREATE TABLE IF NOT EXISTS fitness_classes (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS class_ratings (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    class_id INT(6) UNSIGNED,
    rating INT(1),
    comment TEXT,
    FOREIGN KEY (class_id) REFERENCES fitness_classes(id)
);
";

if (!$conn->multi_query($sql)) {
    echo "Error creating database or tables: " . $conn->error;
}

// Wait for multi statements to finish
while ($conn->more_results() && $conn->next_result());

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $classId = $conn->real_escape_string($_POST["classId"]);
    $rating = $conn->real_escape_string($_POST["rating"]);
    $comment = $conn->real_escape_string($_POST["comment"]);

    $insertSql = "INSERT INTO class_ratings (class_id, rating, comment) VALUES ('$classId', '$rating', '$comment');";
    if ($conn->query($insertSql) === TRUE) {
        echo "<p>Rating submitted successfully!</p>";
    } else {
        echo "<p>Error submitting rating: " . $conn->error . "</p>";
    }
}

// Fetch existing classes for form
$selectClassesSql = "SELECT id, name FROM fitness_classes;";
$classResult = $conn->query($selectClassesSql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Class Rating System</title>
</head>
<body>
<h1>Rate a Fitness Class</h1>
<form action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <label for="classId">Class:</label>
    <select name="classId" id="classId" required>
        <?php
        if ($classResult->num_rows > 0) {
            // output data of each row
            while($row = $classResult->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>" . $row["name"] . "</option>";
            }
        } else {
            echo "<option disabled>No classes available</option>";
        }
        ?>
    </select><br><br>
    <label for="rating">Rating:</label>
    <input type="number" id="rating" name="rating" min="1" max="5" required><br><br>
    <label for="comment">Comment:</label>
    <textarea id="comment" name="comment"></textarea><br><br>
    <input type="submit" name="submit" value="Submit">
</form>

<?php
// Display existing ratings
$ratingsSql = "SELECT fitness_classes.name, class_ratings.rating, class_ratings.comment FROM class_ratings JOIN fitness_classes ON class_ratings.class_id = fitness_classes.id;";
$ratingsResult = $conn->query($ratingsSql);

if ($ratingsResult->num_rows > 0) {
    echo "<h2>Class Ratings</h2>";
    while($row = $ratingsResult->fetch_assoc()) {
        echo "<p><strong>Class:</strong> " . $row["name"] . "<br><strong>Rating:</strong> " . $row["rating"] . "<br><strong>Comment:</strong> " . $row["comment"] . "</p>";
    }
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>

</body>
</html>
