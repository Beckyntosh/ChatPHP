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
$sql = "CREATE TABLE IF NOT EXISTS financial_reports (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  content TEXT NOT NULL,
  year INT(4) NOT NULL,
  quarter INT(1) NOT NULL,
  company_type VARCHAR(50),
  reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Check for form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["search"])) {
  $year = $_POST['year'];
  $quarter = $_POST['quarter'];
  $company_type = $_POST['company_type'];

  $sql = "SELECT * FROM financial_reports WHERE year = ? AND quarter = ? AND company_type LIKE ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("iis", $year, $quarter, $company_type);
  $stmt->execute();
  $result = $stmt->get_result();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Financial Reports Search</title>
</head>
<body>
  <h1>Search Q2 Earnings Reports for Tech Companies 2023</h1>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Year: <input type="number" name="year" value="2023" min="2000" max="2023" required>
    Quarter: <input type="number" name="quarter" value="2" min="1" max="4" required>
    Company Type: <input type="text" name="company_type" value="tech" required>
    <input type="submit" name="search" value="Search">
  </form>
  <?php
  if (!empty($result) && $result->num_rows > 0) {
    echo "<h2>Results:</h2>";
    while($row = $result->fetch_assoc()) {
      echo "<p><b>Title:</b> " . $row["title"]. " - <b>Content:</b> " . $row["content"]. "</p>";
    }
  } elseif ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "<p>No results found.</p>";
  }
  ?>

</body>
</html>
<?php $conn->close(); ?>
