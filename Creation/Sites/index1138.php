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

$sql = "CREATE TABLE IF NOT EXISTS artists (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  genre VARCHAR(30) NOT NULL,
  decade CHAR(4) NOT NULL,
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

$searchTerm = isset($_GET['search']) ? $_GET['search'] : '';

$sql = "SELECT * FROM artists WHERE genre LIKE ? AND decade='1960s'";
$stmt = $conn->prepare($sql);
$likeSearchTerm = "%$searchTerm%";
$stmt->bind_param("s", $likeSearchTerm);
$stmt->execute();
$result = $stmt->get_result();

?>
<!DOCTYPE html>
<html>
<head>
<title>Music and Artist Search</title>
<style>
  body { font-family: Arial, sans-serif; }
  .container { margin: 20px; }
  .search-box { margin-bottom: 20px; }
  table { width: 100%; border-collapse: collapse; }
  th, td { border: 1px solid #dddddd; text-align: left; padding: 8px; }
  tr:nth-child(even) { background-color: #f2f2f2; }
</style>
</head>
<body>

<div class="container">
  <div class="search-box">
    <form action="" method="get">
      <input type="text" name="search" placeholder="Search for Jazz artists from the 1960s" value="<?php echo htmlspecialchars($searchTerm); ?>">
      <input type="submit" value="Search">
    </form>
  </div>

  <?php if ($result->num_rows > 0): ?>
  <table>
    <tr>
      <th>Artist</th>
      <th>Genre</th>
      <th>Decade</th>
    </tr>
    <?php while($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo htmlspecialchars($row['name']); ?></td>
      <td><?php echo htmlspecialchars($row['genre']); ?></td>
      <td><?php echo htmlspecialchars($row['decade']); ?></td>
    </tr>
    <?php endwhile; ?>
  </table>
  <?php else: ?>
  <p>No results found for '<?php echo htmlspecialchars($searchTerm); ?>'</p>
  <?php endif; ?>
</div>

</body>
</html>

<?php
$conn->close();
?>
