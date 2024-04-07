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

// Create tables if they do not exist
$mealPlansTable = "CREATE TABLE IF NOT EXISTS meal_plans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
day VARCHAR(30) NOT NULL,
meal_type VARCHAR(30) NOT NULL,
recipe_id INT(6),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($mealPlansTable) === TRUE) {
  //echo "Table Meal Plans created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$recipesTable = "CREATE TABLE IF NOT EXISTS recipes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT,
dietary_preferences VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($recipesTable) === TRUE) {
  //echo "Table Recipes created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$insertRecipeSample = "INSERT INTO recipes (name, description, dietary_preferences) VALUES ('Sample Recipe', 'This is a sample recipe description.', 'Vegan');";

if ($conn->query($insertRecipeSample) === TRUE) {
  //echo "New record created successfully";
} else {
  //echo "Error: " . $insertRecipeSample . "<br>" . $conn->error;
}

// Handle Post Request
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $day = $_POST['day'];
  $meal_type = $_POST['meal_type'];
  $recipe_id = $_POST['recipe_id'];

  $sql = "INSERT INTO meal_plans (day, meal_type, recipe_id)
  VALUES ('$day', '$meal_type', '$recipe_id')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Simple Meal Plan</title>
</head>
<body>

<h2>Create a Meal Plan</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Day: <input type="text" name="day">
  Meal Type: <input type="text" name="meal_type">
  Recipe ID: <input type="number" name="recipe_id">
  <input type="submit">
</form>

<h2>Recipes</h2>
<?php
$sql = "SELECT id, name, description FROM recipes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["id"]. " - Name: " . $row["name"]. " " . $row["description"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>

</body>
</html>