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

// SQL to create table for reviews
$sqlReviews = "CREATE TABLE IF NOT EXISTS property_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    property_id INT(6) UNSIGNED,
    user_name VARCHAR(30) NOT NULL,
    rating INT(1),
    review TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sqlReviews) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// SQL to create table for properties
$sqlProperties = "CREATE TABLE IF NOT EXISTS properties (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    description TEXT,
    reg_date TIMESTAMP
)";

if ($conn->query($sqlProperties) === TRUE) {
    // Table creation success
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle POST request to submit a review
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit"])) {
    $property_id = htmlspecialchars($_POST['property_id']);
    $user_name = htmlspecialchars($_POST['user_name']);
    $rating = htmlspecialchars($_POST['rating']);
    $review = htmlspecialchars($_POST['review']);

    $stmt = $conn->prepare("INSERT INTO property_reviews (property_id, user_name, rating, review) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("isis", $property_id, $user_name, $rating, $review);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Real Estate Property Reviews</title>
</head>
<body>

<h2>Submit Property Review</h2>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  Property ID: <input type="number" name="property_id">
  <br><br>
  Your Name: <input type="text" name="user_name">
  <br><br>
  Rating:
  <select name="rating">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
  </select>
  <br><br>
  Review: <textarea name="review" rows="5" cols="40"></textarea>
  <br><br>
  <input type="submit" name="submit" value="Submit">  
</form>

</body>
</html>
