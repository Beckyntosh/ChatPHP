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

// Create the ratings table if it doesn't exist
$createTableQuery = "CREATE TABLE IF NOT EXISTS service_ratings (
id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
customer_name VARCHAR(255) NOT NULL,
rating INT(11) NOT NULL,
feedback TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($createTableQuery)) {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $customer_name = $conn->real_escape_string($_POST['customer_name']);
  $rating = $conn->real_escape_string($_POST['rating']);
  $feedback = $conn->real_escape_string($_POST['feedback']);

  $insertSQL = "INSERT INTO service_ratings (customer_name, rating, feedback) VALUES ('$customer_name', '$rating', '$feedback')";

  if ($conn->query($insertSQL) === TRUE) {
    echo "<p style='font-weight:bold;'>Thanks for your feedback!</p>";
  } else {
    echo "Error: " . $insertSQL . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Service Rating System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }
        form {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #bbb;
        }
        .form-control {
            margin-bottom: 20px;
        }
        .form-control label {
            display: block;
            margin-bottom: 5px;
        }
        .form-control input[type='text'],
        .form-control select,
        .form-control textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .form-control textarea {
            resize: vertical;
        }
        .form-control input[type='submit'] {
            width: auto;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .form-control input[type='submit']:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Customer Service Rating</h2>

<form action="" method="post">
    <div class="form-control">
        <label for="customer_name">Your Name</label>
        <input type="text" id="customer_name" name="customer_name" required>
    </div>
    <div class="form-control">
        <label for="rating">Rating</label>
        <select id="rating" name="rating" required>
            <option value="">Choose a rating</option>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
    </div>
    <div class="form-control">
        <label for="feedback">Feedback</label>
        <textarea id="feedback" name="feedback" rows="4" required></textarea>
    </div>
    <div class="form-control">
        <input type="submit" value="Submit">
    </div>
</form>

</body>
</html>
