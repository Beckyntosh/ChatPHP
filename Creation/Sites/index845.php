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

$id = $_GET['id'];

$sql = "SELECT * FROM `users` WHERE id='$id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "User: " . $row["username"]. " - Email: " . $row["email"]. "<br>";

        // get DVD
        $sql = "SELECT * FROM `products` WHERE id='".$row['dvd_id']."'";
        $result2 = $conn->query($sql);

        if ($result2->num_rows > 0) {
            while($row2 = $result2->fetch_assoc()) {
                echo "DVD: " . $row2["title"]. " - Year: " . $row2["year"]. "<br>";
                
                // Badge
                if($row2["year"] < 2000) {
                    echo "<img src='badge_gold.png' alt='Gold Badge'/><br/>";
                } else {
                    echo "<img src='badge_silver.png' alt='Silver Badge'/><br/>";
                }
            }
        } else {
            echo "No DVD found.<br/>";
        }
    }
} else {
    echo "<p>No user found.</p>";
}

$conn->close();
?>