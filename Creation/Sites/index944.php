<?php
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

// Create table if not exists
$tableSql = "CREATE TABLE IF NOT EXISTS service_ratings (
id INT AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(255) NOT NULL,
interaction_type ENUM('online', 'in-store') NOT NULL,
rating INT NOT NULL,
comments TEXT,
created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($tableSql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Insert data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $interaction_type = $_POST['interaction_type'];
    $rating = $_POST['rating'];
    $comments = $_POST['comments'];

    $insertSql = "INSERT INTO service_ratings (customer_name, interaction_type, rating, comments)
    VALUES (?, ?, ?, ?)";

    $stmt = $conn->prepare($insertSql);
    $stmt->bind_param("ssis", $customer_name, $interaction_type, $rating, $comments);

    if ($stmt->execute() === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insertSql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Service Rating</title>
</head>
<body>
    <h2>Rate Our Customer Service</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="customer_name">Your Name:</label><br>
        <input type="text" id="customer_name" name="customer_name" required><br>
        <label for="interaction_type">Type of Interaction:</label><br>
        <select id="interaction_type" name="interaction_type" required>
            <option value="online">Online</option>
            <option value="in-store">In-Store</option>
        </select><br>
        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select><br>
        <label for="comments">Comments:</label><br>
        <textarea id="comments" name="comments"></textarea><br>
        <input type="submit" value="Submit">
    </form>
</body>
</html>
