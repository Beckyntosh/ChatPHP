
<?php
// Database connection setup
$dbServername = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName = "my_database";

$conn = new mysqli($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$checkTablesSQL = "
CREATE TABLE IF NOT EXISTS ratings (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT CHECK (rating >= 1 AND rating <= 5),
    comment TEXT,
    FOREIGN KEY (product_id) REFERENCES products(id),
    FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    title VARCHAR(255),
    description TEXT,
    ingredients TEXT,
    steps TEXT,
    image VARCHAR(255),
    FOREIGN KEY (user_id) REFERENCES users(id)
);
";

if (!$conn->multi_query($checkTablesSQL)) {
    echo "Error creating tables: " . $conn->error;
}

// Close the multi_query loop
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Integrated Website Project</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #fdf6e3;
            color: #586e75;
        }
        .container {
            max-width: 800px;
            margin: auto;
            padding: 20px;
        }
        input[type="submit"], input[type="file"] {
            background-color: #33ff00;
            border: none;
            color: black;
            padding: 10px 20px;
            text-decoration: none;
            margin: 4px 2px;
            cursor: pointer;
        }
        input[type="number"], textarea, input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Rate a Product</h2>
    <form action="" method="post">
        <label for="product_id">Product ID:</label><br>
        <input type="number" id="product_id" name="product_id" required><br>
        <label for="user_id">User ID:</label><br>
        <input type="number" id="user_id" name="user_id" required><br>
        <label for="rating">Rating:</label><br>
        <input type="number" id="rating" name="rating" min="1" max="5" required><br>
        <label for="comment">Comment:</label><br>
        <textarea id="comment" name="comment" rows="4" required></textarea><br>
        <input type="submit" name="submit" value="Submit">
    </form>
</div>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['submit'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_POST['user_id'];
        $rating = $_POST['rating'];
        $comment = $_POST['comment'];

        $sql = "INSERT INTO ratings (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)";

        // Prepare statement
        $stmt = $conn->prepare($sql);

        if ($stmt === false) {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        // Bind params
        $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);

        // Execute statement
        if ($stmt->execute() === true) {
            echo "New rating record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $stmt->error;
        }

        $stmt->close();
    } elseif (isset($_POST['login'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT id, username, name FROM users WHERE username = ? AND password = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc();
            echo "Welcome " . htmlspecialchars($user['name']) . "! You are logged in.";
        } else {
            echo "Invalid Credentials";
        }
        $stmt->close();
    } elseif (isset($_POST['but_upload'])) {
        // File Upload Logic
        $name = $_FILES['file']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["file"]["name"]);

        $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $extensions_arr = array("xml");

        if(in_array($fileType,$extensions_arr) ){
            if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
                $query = "insert into users(file_name) values('".$name."')";
                mysqli_query($conn,$query);
                echo 'Upload successful.';
            }
        }
    }
}

$conn->close();
?>

</body>
</html>
