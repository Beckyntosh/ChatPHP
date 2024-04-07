<?php
// Set up database connection
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

// Create table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS hotel_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    guest_name VARCHAR(30) NOT NULL,
    review_text TEXT NOT NULL,
    rating INT(1) NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = htmlspecialchars($_POST['guest_name']);
    $review_text = htmlspecialchars($_POST['review_text']);
    $rating = htmlspecialchars($_POST['rating']);

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO hotel_reviews (guest_name, review_text, rating) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $guest_name, $review_text, $rating);

    if ($stmt->execute()) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hotel Guest Review & Rating System</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #f0e6d6;
        }
        .container {
            width: 60%;
            margin: auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px #000000;
        }
        input[type=text], select, textarea {
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
    <div class="container">
        <h2>Hotel Guest Review and Rating System</h2>
        <form action="" method="post">
            <label for="guest_name">Name:</label>
            <input type="text" name="guest_name" required>
        
            <label for="review_text">Review:</label>
            <textarea name="review_text" required></textarea>
        
            <label for="rating">Rating:</label>
            <select name="rating" required>
                <option value="1">1 Star</option>
                <option value="2">2 Stars</option>
                <option value="3">3 Stars</option>
                <option value="4">4 Stars</option>
                <option value="5">5 Stars</option>
            </select>
        
            <input type="submit" value="Submit Review">
        </form>
    </div>
</body>
</html>
