<?php
// Server connection parameters
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

// Attempt to create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
property_name VARCHAR(100) NOT NULL,
agent_name VARCHAR(100),
rating INT(2),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table creation success
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $property_name = $_POST['property_name'];
  $agent_name = $_POST['agent_name'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $stmt = $conn->prepare("INSERT INTO reviews (property_name, agent_name, rating, review) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $property_name, $agent_name, $rating, $review);

  if($stmt->execute()){
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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
    <h2>Property Review Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="property_name">Property Name:</label><br>
        <input type="text" id="property_name" name="property_name" required><br>
        
        <label for="agent_name">Agent Name:</label><br>
        <input type="text" id="agent_name" name="agent_name"><br>
        
        <label for="rating">Rating:</label><br>
        <select id="rating" name="rating">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        
        <label for="review">Review:</label><br>
        <textarea id="review" name="review" rows="4" cols="50" required></textarea><br>
        
        <input type="submit" value="Submit">
    </form>
</body>

</html>
