<?php
// Connect to the database
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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // collect value of input field
  $productName = $_POST['productName'];
  $customSize = $_POST['customSize'];

  // Prepare the SQL statement
  $stmt = $conn->prepare("INSERT INTO orders (productName, customSize) VALUES (?, ?)");
  $stmt->bind_param("ss", $productName, $customSize);

  // Execute the statement and check if it succeeds
  if ($stmt->execute()) {
    echo "New order created successfully.";
  } else {
    echo "Error: " . $stmt . "<br>" . $conn->error;
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Order</title>
</head>
<body>
    <h2>Add a Custom Order for a Beauty Product</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
        Product Name: <input type="text" name="productName" required>
        <br><br>
        Custom Size: <input type="text" name="customSize" required>
        <br><br>
        <input type="submit" name="submit" value="Submit">  
    </form>

    <p><strong>Note:</strong> The product will be added to your orders list.</p>
</body>
</html>

Note: Before deploying the provided PHP source code, ensure you've created a table named `orders` in the database `my_database` with at least two columns: `productName` (VARCHAR) and `customSize` (VARCHAR). You can adjust the database credentials as per your setup.