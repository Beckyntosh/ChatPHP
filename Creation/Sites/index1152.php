<?php
// Connection to the database
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

// Create table if it does not exist
$tableQuery = "CREATE TABLE IF NOT EXISTS jobs (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  location VARCHAR(100),
  type ENUM('full-time', 'part-time', 'contract', 'remote') NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($tableQuery)) {
  echo "Error creating table: " . $conn->error;
}

// Adding a simple search form
echo "<form action='?' method='post'>
  <label for='search'>Job Title:</label>
  <input type='text' id='search' name='search'>
  <label for='location'>Location:</label>
  <select id='location' name='location'>
    <option value=''>Any</option>
    <option value='remote'>Remote</option>
    <option value='in-office'>In-office</option>
  </select>
  <input type='submit' value='Search'>
</form>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = $_POST['search'];
  $location = $_POST['location'];

  // Santizing input
  $search = htmlspecialchars($search);
  $location = htmlspecialchars($location);

  // Preparing a statement
  $sql = "SELECT * FROM jobs WHERE title LIKE ? ";
  $params = ["%$search%"];
  
  if($location == 'remote') {
    $sql .= "AND location = 'remote'";
  }

  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", ...$params);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Title: " . $row["title"]. " " . $row["location"]. "<br>";
    }
  } else {
    echo "0 results";
  }
} else {
  // Display all jobs when the page loads initially
  $sql = "SELECT id, title, location FROM jobs";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "id: " . $row["id"]. " - Title: " . $row["title"]. " " . $row["location"]. "<br>";
    }
  } else {
    echo "0 jobs found";
  }
}

$conn->close();
?>
