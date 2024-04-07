<?php

$serverName = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

// Create connection
$conn = new mysqli($serverName, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS Properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    address VARCHAR(255),
    review TEXT,
    rating INT(1),
    agent_name VARCHAR(255),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $address = $_POST['address'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $agent_name = $_POST['agent_name'];
  
    $stmt = $conn->prepare("INSERT INTO Properties (title, address, review, rating, agent_name) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssis", $title, $address, $review, $rating, $agent_name);
  
    $stmt->execute();
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real Estate Review Platform</title>
</head>
<body>
    <h1>Submit Property Review</h1>
    <form action="" method="post">
        <input type="text" name="title" placeholder="Property Title" required><br>
        <input type="text" name="address" placeholder="Property Address" required><br>
        <textarea name="review" placeholder="Write your review" required></textarea><br>
        <input type="number" name="rating" placeholder="Rating (1-5)" min="1" max="5" required><br>
        <input type="text" name="agent_name" placeholder="Agent Name" required><br>
        <button type="submit">Submit Review</button>
    </form>
    <h2>Recent Reviews</h2>
    <?php
    $sql = "SELECT * FROM Properties ORDER BY created_at DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        echo "<div><strong>" . $row["title"]. "</strong> - " . $row["address"]. " - <em>" . $row["agent_name"]."</em><br>Rating: " . $row["rating"] . "<br>" . $row["review"] . "<br><br></div>";
      }
    } else {
      echo "No reviews yet.";
    }
    $conn->close();
    ?>
</body>
</html>
