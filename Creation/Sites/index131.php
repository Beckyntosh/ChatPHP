<?php
// DB connection
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Create table for custom orders if not exists
$customOrdersTable = "CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    customer_name VARCHAR(30) NOT NULL,
    book_title VARCHAR(100) NOT NULL,
    custom_details TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($customOrdersTable)) {
  echo "Error creating table: " . $conn->error;
}

// Handle form submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customer_name = $_POST['customer_name'];
    $book_title = $_POST['book_title'];
    $custom_details = $_POST['custom_details'];

    $sql = "INSERT INTO custom_orders (customer_name, book_title, custom_details)
    VALUES ('$customer_name', '$book_title', '$custom_details')";

    if ($conn->query($sql) === TRUE) {
        echo "New custom order created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Order Form</title>
    <style>
        body{
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        form{
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 5px;
        }
        input[type=text], textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
          width: 100%;
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          border-radius: 4px;
          cursor: pointer;
        }

        input[type=submit]:hover {
          background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Request Custom Book Order</h2>
    <form method="POST">
      <label for="customer_name">Your name:</label><br>
      <input type="text" id="customer_name" name="customer_name" required><br>

      <label for="book_title">Book Title:</label><br>
      <input type="text" id="book_title" name="book_title" required><br>

      <label for="custom_details">Custom Details:</label><br>
      <textarea id="custom_details" name="custom_details" required></textarea><br>

      <input type="submit" value="Submit">
    </form>
</body>
</html>
