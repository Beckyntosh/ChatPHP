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

// Create table for expenses if it does not exist
$table_sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
expense_name VARCHAR(30) NOT NULL,
amount DECIMAL(10,2) NOT NULL,
category VARCHAR(30) NOT NULL,
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  echo ""; // Successfully created table
} else {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $expense_name = $_POST['expense_name'];
  $amount = $_POST['amount'];
  $category = $_POST['category'];

  $insert_sql = "INSERT INTO expenses (expense_name, amount, category)
  VALUES ('$expense_name', '$amount', '$category')";

  if ($conn->query($insert_sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $insert_sql . "<br>" . $conn->error;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Expense</title>
</head>
<body>

<h2>Add Expense to Personal Budget</h2>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  <label for="expense_name">Expense Name:</label><br>
  <input type="text" id="expense_name" name="expense_name" required><br>
  
  <label for="amount">Amount ($):</label><br>
  <input type="text" id="amount" name="amount" pattern="^\d*(\.\d{0,2})?$" required><br>
  
  <label for="category">Category:</label><br>
  <select id="category" name="category" required>
    <option value="Food">Food</option>
    <option value="Wellness">Wellness</option>
    <option value="Fitness">Fitness</option>
  </select><br><br>
  
  <input type="submit" value="Submit">
</form> 

</body>
</html>
