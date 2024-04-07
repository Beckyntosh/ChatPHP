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

echo "<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css'>";

if(isset($_POST["submit"])) {
    $search = $_POST["search"];

    // Search for nutrition plans
    $sql = "SELECT * FROM products WHERE `name` LIKE '%$search%' OR `description` LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        echo "<h2>Nutrition Plans</h2>";
        echo "<table class='table table-bordered'>";
        echo "<tr><th>Name</th><th>Description</th></tr>";
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>". $row["name"]. "</td><td>". $row["description"]. "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results found";
    }
    $conn->close();
}

?>

<body style="background-color:#2D2D44;color:#d6d7d9;">

<h1 style="text-align:center;">Cosmic Voyage Nutrition Plans</h1>

<form method="post" action="">
  <label for="search">Search:</label><br>
  <input type="text" id="search" name="search"><br>
  <input type="submit" name="submit" value="Search">
</form>

</body>