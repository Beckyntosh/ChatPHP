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

// Create expense table if not exists
$sql = "CREATE TABLE IF NOT EXISTS expenses (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
category VARCHAR(30) NOT NULL,
amount DOUBLE(10,2) NOT NULL,
expense_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Success
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $category = $_POST['category'];
    $amount = $_POST['amount'];

    $sql = "INSERT INTO expenses (category, amount) VALUES ('$category', $amount)";

    if ($conn->query($sql) === TRUE) {
      echo "<script>alert('New record created successfully');</script>";
    } else {
      echo "<script>alert('Error: " . $sql . "<br>" . $conn->error . "');</script>";
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Expense - Sporting Goods</title>
<style>
    body {font-family: 'Times New Roman', Times, serif; background-color: #f0e6d2; color: #333;}
    form {background-color: #fff; padding: 20px; margin: 50px auto; width: 300px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);}
    input[type=text], input[type=number] {width: 100%; padding: 10px; margin: 10px 0; background: #f8f8f8; border: 1px solid #ddd;}
    input[type=submit] {width: 100%; padding: 10px; margin: 10px 0; background: #009688; color: #fff; border: none; cursor: pointer;}
    input[type=submit]:hover {background: #00796b;}
</style>
</head>
<body>
<div>
    <form method="POST">
        <h2>Add Expense</h2>
        <label for="category">Category:</label> <br>
        <input type="text" id="category" name="category" value="Food" required><br>
        <label for="amount">Amount:</label><br>
        <input type="number" id="amount" name="amount" required><br>
        <input type="submit" value="Add Expense">
    </form>
</div>
</body>
</html>
