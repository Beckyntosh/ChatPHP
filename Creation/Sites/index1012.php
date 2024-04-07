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

// Create tables
$classesTable = "CREATE TABLE IF NOT EXISTS classes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT NOT NULL,
reg_date TIMESTAMP
)";

$reviewsTable = "CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_id INT(6) UNSIGNED,
rating INT(1),
comment TEXT,
FOREIGN KEY (class_id) REFERENCES classes(id),
reg_date TIMESTAMP
)";

if ($conn->query($classesTable) === TRUE && $conn->query($reviewsTable) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = $_POST['className'];
  $description = $_POST['description'];
  $rating = $_POST['rating'];
  $comment = $_POST['comment'];

  // Insert class
  $insertClass = "INSERT INTO classes (name, description) VALUES ('$name', '$description')";
  if($conn->query($insertClass) === TRUE) {
    $class_id = $conn->insert_id;
    $insertReview = "INSERT INTO reviews (class_id, rating, comment) VALUES ('$class_id', '$rating', '$comment')";
    $conn->query($insertReview);
  } else {
    echo "Error: " . $insertClass . "<br>" . $conn->error;
  }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Class Rating System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 800px; margin: auto; padding: 20px; }
        form { margin-bottom: 40px; }
        ul { list-style-type: none; padding: 0; }
        li { margin: 10px 0; }
        .rating { color: #FFD700; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Fitness Class & Review</h2>
    <form action="" method="post">
        <label for="className">Class Name:</label><br>
        <input type="text" id="className" name="className"><br><br>
        <label for="description">Description:</label><br>
        <textarea id="description" name="description"></textarea><br><br>
        <label for="rating">Rating (1-5):</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5"><br><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment"></textarea><br><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Class Reviews</h2>
    <ul>
    <?php
    $sql = "SELECT classes.name, reviews.rating, reviews.comment 
            FROM reviews 
            INNER JOIN classes ON reviews.class_id = classes.id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<li><strong>" . $row["name"]. "</strong> - Rating: <span class='rating'>" . $row["rating"] . "</span><br>Comment: " . $row["comment"] . "</li>";
        }
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>
    </ul>
</div>
</body>
</html>
