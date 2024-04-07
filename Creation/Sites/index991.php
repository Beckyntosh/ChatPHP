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
$sql = "CREATE TABLE IF NOT EXISTS ServiceRatings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_id INT(6) UNSIGNED NOT NULL,
service_type VARCHAR(30) NOT NULL,
rating INT(1) NOT NULL,
comments TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table ServiceRatings created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Post rating
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $service_type = htmlspecialchars($_POST['service_type']);
  $rating = htmlspecialchars($_POST['rating']);
  $comments = htmlspecialchars($_POST['comments']);
  $customer_id = htmlspecialchars($_POST['customer_id']); // Assuming a customer ID is available

  $stmt = $conn->prepare("INSERT INTO ServiceRatings (customer_id, service_type, rating, comments) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("isis", $customer_id, $service_type, $rating, $comments);
  
  if ($stmt->execute()) {
    echo "<p>Thank you for your feedback!</p>";
  } else {
    echo "<p>Sorry, there was an error. Please try again later.</p>";
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Service Rating</title>
</head>
<body>
    <h2>Rate Our Service</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="service_type">Service Type:</label><br>
        <select id="service_type" name="service_type" required>
            <option value="Online">Online</option>
            <option value="In-Store">In-Store</option>
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
        <textarea id="comments" name="comments" rows="4" cols="50"></textarea><br>
        
        <label for="customer_id">Customer ID:</label><br>
        <input type="text" id="customer_id" name="customer_id" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>
