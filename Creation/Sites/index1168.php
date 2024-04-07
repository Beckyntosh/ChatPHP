<?php 

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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS employees (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    position VARCHAR(50) NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer_id INT(6) UNSIGNED,
    reviewee_id INT(6) UNSIGNED,
    rating INT(5),
    comments TEXT,
    review_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (reviewer_id) REFERENCES employees(id),
    FOREIGN KEY (reviewee_id) REFERENCES employees(id)
    )";

if (!$conn->query($sql) === TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $reviewer_id = $_POST['reviewer_id'];
  $reviewee_id = $_POST['reviewee_id'];
  $rating = $_POST['rating'];
  $comments = $_POST['comments'];

  $sql = "INSERT INTO reviews (reviewer_id, reviewee_id, rating, comments)
  VALUES ('$reviewer_id', '$reviewee_id', '$rating', '$comments')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Review System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
        }
        .container {
            width: 50%;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input, select, textarea {
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Submit a Performance Review</h2>
    <form method="post">
        <label for="reviewer_id">Reviewer ID:</label>
        <input type="number" id="reviewer_id" name="reviewer_id" required>
        
        <label for="reviewee_id">Reviewee ID:</label>
        <input type="number" id="reviewee_id" name="reviewee_id" required>
        
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments" rows="4" required></textarea>
        
        <button type="submit">Submit Review</button>
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
