<?php
// Connection parameters
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

// Check if search query is set
$searchQuery = isset($_POST['search']) ? $_POST['search'] : '';

// Creating table for artists if it does not exist
$createTable = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  genre VARCHAR(50),
  decade VARCHAR(20),
  reg_date TIMESTAMP
)";

if (!$conn->query($createTable)) {
  echo "Error creating table: " . $conn->error;
}

// Search query
$sql = "SELECT name, genre, decade FROM artists WHERE genre LIKE '%Jazz%' AND decade='1960s' AND (name LIKE '%$searchQuery%' OR genre LIKE '%$searchQuery%')";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
  <title>Music Collection Search</title>
  <style>
    body { font-family: Arial, sans-serif; background-color: #f0e68c; color: #333; }
    .container { width: 80%; margin: 0 auto; background-color: #fff; padding: 20px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
    table { width: 100%; border-collapse: collapse; }
    th, td { text-align: left; padding: 8px; border-bottom: 1px solid #ddd; }
    th { background-color: #f9d5e5; }
    .searchBox { margin-bottom: 20px; }
    input[type="text"], button { padding: 10px; margin-right: 10px; }
    button { background-color: #ff69b4; color: white; border: none; cursor: pointer; }
  </style>
</head>
<body>

<div class="container">
  <h2>Music and Artist Search</h2>
  <div class="searchBox">
    <form action="" method="post">
      <input type="text" name="search" placeholder="Search for Jazz artists from the 1960s...">
      <button type="submit">Search</button>
    </form>
  </div>
  <?php
  if ($result && $result->num_rows > 0) {
    echo "<table><tr><th>Name</th><th>Genre</th><th>Decade</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
      echo "<tr><td>".$row["name"]."</td><td>".$row["genre"]."</td><td>".$row["decade"]."</td></tr>";
    }
    echo "</table>";
  } else {
    echo "0 results found";
  }
  ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
