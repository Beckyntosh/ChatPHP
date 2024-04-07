<?php
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$followedUserId = $_GET['followed_user']; 
$currentUserID = $_SESSION['user_id']; 

if(isset($_GET['follow'])) {

  $sql = "INSERT INTO user_follows (user_id, followed_user_id) VALUES ($currentUserID, $followedUserId)";
  
  if ($conn->query($sql) === TRUE) {
    echo "user followed successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}


echo "<h2>Followed User's Tickets</h2>";
echo "<table>
<tr>
<th>Product Name</th>
<th>Place</th>
<th>Date</th>
</tr>";

// Fetch tickets of the followed user and display them  
$sql = "SELECT * FROM products WHERE user_id=$followedUserId";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["product_name"]. "</td><td>" . $row["place"] . "</td><td>" . $row["date"] ."</td></tr>";
  }
} else {
  echo "0 results";
}
echo "</table>";
$conn->close();
?>