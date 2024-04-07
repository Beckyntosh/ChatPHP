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

// Create table if it doesn't exist
$sql = "CREATE TABLE IF NOT EXISTS HealthcareRatings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
providerName VARCHAR(50) NOT NULL,
rating INT(1),
review TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table HealthcareRatings created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $providerName = $_POST['providerName'];
  $rating = $_POST['rating'];
  $review = $_POST['review'];

  $stmt = $conn->prepare("INSERT INTO HealthcareRatings (providerName, rating, review) VALUES (?, ?, ?)");
  $stmt->bind_param("sis", $providerName, $rating, $review);
  
  if($stmt->execute()){
    echo "New record created successfully";
  } else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Healthcare Provider Ratings</title>
    <style>
        body {font-family: Arial, sans-serif; background-color: #f4f4f4;}
        .container {max-width: 600px; margin: auto; padding: 20px; background-color: #fff; margin-top: 50px; box-shadow: 0 0 10px 0 rgba(0,0,0,0.3);}
        input[type=text], input[type=number] {width: 100%; padding: 15px; margin: 5px 0 22px 0; border: 1px solid #ccc; background: #f1f1f1;}
        input[type=submit] {background-color: #4CAF50; color: white; padding: 14px 20px; border: none; cursor: pointer; width: 100%;}
        input[type=submit]:hover {background-color: #45a049;}
    </style>
</head>
<body>

<div class="container">
    <h2>Rate Your Healthcare Provider</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <label for="providerName">Provider Name</label>
        <input type="text" id="providerName" name="providerName" required>
        
        <label for="rating">Rating</label>
        <input type="number" id="rating" name="rating" min="1" max="5" required>
        
        <label for="review">Review</label>
        <textarea id="review" name="review" style="height:200px" required></textarea>
        
        <input type="submit" value="Submit">
    </form>
</div>

</body>
</html>
