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
$sql = "CREATE TABLE IF NOT EXISTS MealPlans (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
plan_name VARCHAR(50) NOT NULL,
meal_type VARCHAR(50),
dietary_pref VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created successfully
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $plan_name = $_POST['plan_name'];
  $meal_type = $_POST['meal_type'];
  $dietary_pref = $_POST['dietary_pref'];

  $stmt = $conn->prepare("INSERT INTO MealPlans (plan_name, meal_type, dietary_pref) VALUES (?, ?, ?)");
  $stmt->bind_param("sss", $plan_name, $meal_type, $dietary_pref);

  if ($stmt->execute() === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $stmt->error;
  }
  $stmt->close();
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Simple Meal Plan</title>
<style>
body {
  font-family: Arial, sans-serif;
}
.form-container {
  margin: 20px;
  padding: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
}
</style>
</head>
<body>

<div class="form-container">
<h2>Create a Meal Plan</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="plan_name">Plan Name:</label><br>
  <input type="text" id="plan_name" name="plan_name" required><br><br>
  
  <label for="meal_type">Meal Type:</label><br>
  <select id="meal_type" name="meal_type">
    <option value="Breakfast">Breakfast</option>
    <option value="Lunch">Lunch</option>
    <option value="Dinner">Dinner</option>
  </select><br><br>

  <label for="dietary_pref">Dietary Preferences:</label><br>
  <select id="dietary_pref" name="dietary_pref">
    <option value="None">None</option>
    <option value="Vegan">Vegan</option>
    <option value="Vegetarian">Vegetarian</option>
    <option value="Gluten-Free">Gluten-Free</option>
  </select><br><br>

  <input type="submit" value="Submit">
</form> 
</div>

</body>
</html>
