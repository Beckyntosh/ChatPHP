<?php
// Minimalistic product comparison tool for Craft Beers.

$servername = "db"; // Assuming using Docker or similar, hence 'db' as servername.
$username = "root";
$password = "root";
$dbname = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Handling form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $beer1 = $_POST['beer1'];
    $beer2 = $_POST['beer2'];
}

// SQL to create table - run this script once manually or integrate into your deployment process
// CREATE TABLE IF NOT EXISTS `beers` (
//   `id` int(11) NOT NULL AUTO_INCREMENT,
//   `name` varchar(50) NOT NULL,
//   `type` varchar(50) NOT NULL,
//   `abv` decimal(3,1) NOT NULL,
//   `ibu` int(11) NOT NULL,
//   `description` text,
//   PRIMARY KEY (`id`)
// ) ENGINE=InnoDB DEFAULT CHARSET=utf8;

// HTML and PHP mixed for simplicity - frontend part
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Craft Beers Comparison Tool</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
<h2>Compare Craft Beers</h2>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    Beer 1: <input type="text" name="beer1" required>
    Beer 2: <input type="text" name="beer2" required>
    <input type="submit" value="Compare">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch and Compare Beers
    $stmt = $conn->prepare("SELECT name, type, abv, ibu, description FROM beers WHERE name=? OR name=?");
    $stmt->bind_param("ss", $beer1, $beer2);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<table><tr><th>Name</th><th>Type</th><th>ABV (%)</th><th>IBU</th><th>Description</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>".$row["name"]."</td><td>".$row["type"]."</td><td>".$row["abv"]."</td><td>".$row["ibu"]."</td><td>".$row["description"]."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $stmt->close();
}
$conn->close();
?>

</body>
</html>
