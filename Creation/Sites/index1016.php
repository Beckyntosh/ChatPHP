<?php
// Simple Real Estate Review Platform

// Database connection
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

// Create tables if not exists
$createTables = "
CREATE TABLE IF NOT EXISTS Properties (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    location VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Agents (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS Reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    property_id INT,
    agent_id INT,
    user VARCHAR(255) NOT NULL,
    rating INT NOT NULL,
    comment TEXT,
    FOREIGN KEY (property_id) REFERENCES Properties(id),
    FOREIGN KEY (agent_id) REFERENCES Agents(id)
);
";

if (!$conn->multi_query($createTables)) {
    echo "Error creating tables: " . $conn->error;
}

$conn->close();

// Process form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Connect to database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Collect and sanitize input data
    $property_id = isset($_POST['property_id']) ? $conn->real_escape_string($_POST['property_id']) : null;
    $agent_id = isset($_POST['agent_id']) ? $conn->real_escape_string($_POST['agent_id']) : null;
    $user = $conn->real_escape_string($_POST['user']);
    $rating = $conn->real_escape_string($_POST['rating']);
    $comment = $conn->real_escape_string($_POST['comment']);

    // Insert data into the Reviews table
    $sql = "INSERT INTO Reviews (property_id, agent_id, user, rating, comment) VALUES ('$property_id', '$agent_id', '$user', '$rating', '$comment')";

    if ($conn->query($sql) === TRUE) {
        echo "Review successfully submitted.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Property Reviews</title>
</head>
<body>

<h2>Submit a Review</h2>

<form action="" method="post">
    Property ID (optional): <input type="text" name="property_id"><br>
    Agent ID (optional): <input type="text" name="agent_id"><br>
    Your Name: <input type="text" name="user" required><br>
    Rating (1-5): <input type="number" name="rating" min="1" max="5" required><br>
    Comment: <textarea name="comment"></textarea><br>
    <input type="submit" value="Submit Review">
</form>

</body>
</html>
