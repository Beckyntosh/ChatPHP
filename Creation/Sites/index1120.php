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

// Create tables if not exists
$artistsTable = "CREATE TABLE IF NOT EXISTS Artists (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
genre VARCHAR(30) NOT NULL,
decade VARCHAR(30),
reg_date TIMESTAMP
)";

$musicTable = "CREATE TABLE IF NOT EXISTS Music (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(50),
artist_id INT(6) UNSIGNED,
FOREIGN KEY (artist_id) REFERENCES Artists(id),
year INT(4),
reg_date TIMESTAMP
)";

// Execute table creation
$conn->query($artistsTable);
$conn->query($musicTable);

$search = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect value of input field
    $search = htmlspecialchars($_POST['search']);
    $sql = "SELECT Artists.name, Music.title, Music.year 
            FROM Artists 
            INNER JOIN Music ON Artists.id=Music.artist_id 
            WHERE Artists.genre='Jazz' AND Music.year BETWEEN 1960 AND 1969 AND Artists.name LIKE '%$search%'";

    $result = $conn->query($sql);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Music Collection Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f8ff;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: auto;
        }
        .search {
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #4CAF50;
            color: white;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Music and Artist Search</h2>
    <form class="search" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <input type="text" name="search" placeholder="Search Jazz artists from the 1960s">
        <input type="submit" value="Search">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if ($result->num_rows > 0) {
        echo "<table><tr><th>Artist</th><th>Title</th><th>Year</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "<tr><td>".$row["name"]."</td><td>".$row["title"]."</td><td>".$row["year"]."</td></tr>";
        }
        echo "</table>";
      } else {
        echo "0 results";
      }
    }
    ?>
</div>
</body>
</html>
<?php
$conn->close();
?>
