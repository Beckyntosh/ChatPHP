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

// Create table if it does not exist
$createTableSql = "CREATE TABLE IF NOT EXISTS artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
period VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($createTableSql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

$search = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $search = test_input($_POST["search"]);
  $sql = "SELECT name, genre, period FROM artists WHERE genre LIKE '%$search%' OR period LIKE '%$search%' OR name LIKE '%$search%'";
  $result = $conn->query($sql);

}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Music and Artist Search</title>
</head>
<body>
  <h2>Search for Music Artists</h2>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
    Search: <input type="text" name="search">
    <input type="submit" name="submit" value="Submit">  
  </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if ($result->num_rows > 0) {
    // output data of each row
    echo "<ul>";
    while($row = $result->fetch_assoc()) {
      echo "<li> Name: ". $row["name"]. " - Genre: ". $row["genre"]. " - Period: ". $row["period"]. "</li>";
    }
    echo "</ul>";
  } else {
    echo "0 results found";
  }
}
$conn->close();
?>
</body>
</html>
