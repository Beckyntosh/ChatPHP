<?php
// DISCLAIMER: This code is for educational purposes only. 
// Always secure your applications by sanitizing input, using prepared statements, and following best practices.

// Establish DB Connection
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

// Create Jobs Table if not exists
$sql = "CREATE TABLE IF NOT EXISTS jobs (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
description TEXT NOT NULL,
location VARCHAR(255),
type VARCHAR(50),
posted_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "Table Jobs created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle Form Submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST['search'];
  // WARNING: This is vulnerable to SQL Injection, use Prepared Statement instead.
  $sql = "SELECT * FROM jobs WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
  $result = $conn->query($sql);
} else {
  $sql = "SELECT * FROM jobs";
  $result = $conn->query($sql);
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Job Listing Search</title>
    <style>
        body { background-color: #e0e0e0; color: #333; font-family: 'Arial'; }
        .container { width: 80%; margin: auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .job { padding: 10px; margin-bottom: 10px; border-bottom: 1px solid #eee; }
        .job:last-child { border-bottom: none; }
        .title { color: #333; font-size: 20px; }
        .description { color: #666; }
        .location, .type { background-color: #f1f1f1; color: #333; padding: 2px 5px; border-radius: 5px; font-size: 12px; }
    </style>
</head>
<body>
<div class="container">
    <h1>Job Search</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search Job Titles or Descriptions...">
        <input type="submit" value="Search">
    </form>
    
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while($row = $result->fetch_assoc()) {
        echo "<div class='job'><div class='title'>" . $row["title"]. "</div><div class='description'>". $row["description"]. "</div><div class='location'>". $row["location"]. "</div> <div class='type'>". $row["type"]."</div></div>";
      }
    } else {
      echo "0 results";
    }
    ?>
</div>
</body>
</html>

<?php
$conn->close();
?>
