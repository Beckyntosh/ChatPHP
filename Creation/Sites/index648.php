<?php
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "CREATE TABLE IF NOT EXISTS feedback (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT NOT NULL,
    user_id INT NOT NULL,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
)";

if(!mysqli_query($link, $sql)){
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $sql = "INSERT INTO feedback (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";

    if ($stmt = mysqli_prepare($link, $sql)) {
        mysqli_stmt_bind_param($stmt, "iiis", $param_product_id, $param_user_id, $param_rating, $param_comment);

        $param_product_id = $product_id;
        $param_user_id = $user_id;
        $param_rating = $rating;
        $param_comment = $comment;

        if (mysqli_stmt_execute($stmt)) {
            echo "Feedback successfully saved.";
        } else {
            echo "ERROR: Could not execute query: $sql. " . mysqli_error($link);
        }
    } else {
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
}

mysqli_close($link);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submit Your Feedback</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #e9f7ef;
            color: #5c6b77;
        }
        .container {
            margin: 20px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        input[type=text], select, textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
            resize: vertical;
        }
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
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
    <h2>Submit Your Feedback</h2>
    <form action="" method="post">
        <label for="product_id">Product ID:</label>
        <input type="text" id="product_id" name="product_id" required>
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required>
        <label for="rating">Rating:</label>
        <select id="rating" name="rating" required>
            <option value="1">1 - Very Poor</option>
            <option value="2">2 - Poor</option>
            <option value="3">3 - Average</option>
            <option value="4">4 - Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        <label for="comment">Comment:</label>
        <textarea id="comment" name="comment" style="height:200px" required></textarea>
        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>