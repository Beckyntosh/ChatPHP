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

// Check if table exists, if not create one
if (!$conn->query("DESCRIBE `hotel_reviews`")) {
    $sql = "CREATE TABLE hotel_reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        guest_name VARCHAR(30) NOT NULL,
        review TEXT NOT NULL,
        rating INT(6) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

    if ($conn->query($sql) === TRUE) {
        echo "Table hotel_reviews created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle the post request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $guest_name = $_POST['guest_name'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];

    $sql = "INSERT INTO hotel_reviews (guest_name, review, rating)
    VALUES ('$guest_name', '$review', '$rating')";

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
    <title>Hotel Guest Review System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fafafa;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
        }
        input[type="submit"] {
            background-color: #5cb85c;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #4cae4c;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Hotel Guest Review Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="guest_name">Name:</label>
        <input type="text" id="guest_name" name="guest_name" required><br>

        <label for="review">Review:</label>
        <textarea id="review" name="review" rows="4" required></textarea><br>

        <label for="rating">Rating (1-5):</label>
        <input type="text" id="rating" name="rating" required><br>

        <input type="submit" value="Submit">
    </form>
</div>

<div class="container">
    <h2>Reviews</h2>
    <?php
    $sql = "SELECT guest_name, review, rating, reg_date FROM hotel_reviews ORDER BY reg_date DESC";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row["guest_name"]. "</strong> - Rating: " . $row["rating"]. " <br> " . $row["review"]. " <br><small>Posted on " . $row["reg_date"]."</small></p>";
        }
    } else {
        echo "0 reviews";
    }
    $conn->close();
    ?>
</div>

</body>
</html>
