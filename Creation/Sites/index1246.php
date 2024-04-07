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

// Create travel plan table if not exists
$sql = "CREATE TABLE IF NOT EXISTS travel_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
destination VARCHAR(50) NOT NULL,
flight VARCHAR(100),
hotel VARCHAR(100),
user_comment TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table travel_plans created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Insert a new travel plan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $destination = htmlspecialchars($_POST['destination']);
  $flight = htmlspecialchars($_POST['flight']);
  $hotel = htmlspecialchars($_POST['hotel']);
  $user_comment = htmlspecialchars($_POST['user_comment']);
  
  $sql = "INSERT INTO travel_plans (destination, flight, hotel, user_comment)
  VALUES ('$destination', '$flight', '$hotel', '$user_comment')";

  if ($conn->query($sql) === TRUE) {
    //echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

// Retrieve all travel plans
$sql = "SELECT id, destination, flight, hotel, user_comment FROM travel_plans";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
<title>Travel Plan App</title>
<style>
body { font-family: Arial, sans-serif; }
form, table { margin: 20px auto; width: 80%; }
td, th { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
</style>
</head>
<body>

<h2>Create Your Travel Plan</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Destination: <input type="text" name="destination" required><br><br>
  Flight: <input type="text" name="flight" required><br><br>
  Hotel: <input type="text" name="hotel" required><br><br>
  Comments: <textarea name="user_comment"></textarea><br><br>
  <input type="submit" value="Submit">
</form>

<h2>Your Travel Plans</h2>
<table>
  <tr>
    <th>Destination</th>
    <th>Flight</th>
    <th>Hotel</th>
    <th>Comments</th>
  </tr>
<?php
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["destination"]. "</td><td>" . $row["flight"]. "</td><td>" . $row["hotel"]. "</td><td>" . $row["user_comment"]. "</td></tr>";
  }
} else {
  echo "<tr><td colspan='4'>No plans found</td></tr>";
}
?>
</table>

</body>
</html>
