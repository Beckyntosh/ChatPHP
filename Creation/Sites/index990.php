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
$sql = "CREATE TABLE IF NOT EXISTS service_rating (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(50) NOT NULL,
service_type ENUM('online', 'in-store') NOT NULL,
rating INT(1) NOT NULL,
comments TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  echo ""; // Table created or already exists
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $_POST['customer_name'];
  $service_type = $_POST['service_type'];
  $rating = $_POST['rating'];
  $comments = $_POST['comments'];

  $stmt = $conn->prepare("INSERT INTO service_rating (customer_name, service_type, rating, comments) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssis", $customer_name, $service_type, $rating, $comments);

  // execute and close
  $stmt->execute();
  $stmt->close();
  echo "<p>Thank you for your feedback!</p>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Service Rating</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-top: 10px;
        }
        input[type=text], select, textarea {
            padding: 10px;
            margin-top: 5px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
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
<div class="container">
    <h2>Rate Our Customer Service</h2>
    <form action="" method="post">
        <label for="customer_name">Your Name:</label>
        <input type="text" id="customer_name" name="customer_name" required>
        
        <label for="service_type">Service Type:</label>
        <select id="service_type" name="service_type" required>
            <option value="online">Online</option>
            <option value="in-store">In-Store</option>
        </select>
        
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        
        <label for="comments">Comments:</label>
        <textarea id="comments" name="comments"></textarea>
        
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
