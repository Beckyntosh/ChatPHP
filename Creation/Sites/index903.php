<?php
// Database connection
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

// Create reviews table if not exists
$sql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_id INT,
    user_id INT,
    rating INT(1),
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === FALSE) {
    echo "Error creating table: " . $conn->error;
}

// Insert review
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit_review'])) {
    $product_id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $rating = $_POST['rating'];
    $comment = $_POST['comment'];

    $stmt = $conn->prepare("INSERT INTO reviews (product_id, user_id, rating, comment) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iiis", $product_id, $user_id, $rating, $comment);
    
    if ($stmt->execute()) {
        echo "Review added successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

// Create volunteers table if not exists
$sql = "CREATE TABLE IF NOT EXISTS volunteers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100),
    email VARCHAR(50),
    age INT,
    skills TEXT,
    availability TEXT
);";

if ($conn->query($sql) !== TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Insert volunteer if POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["name"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $age = $_POST["age"];
    $skills = $_POST["skills"];
    $availability = $_POST["availability"];
    
    $sql = "INSERT INTO volunteers (name, email, age, skills, availability) 
            VALUES (?, ?, ?, ?, ?);";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssiis", $name, $email, $age, $skills, $availability);
    
    if ($stmt->execute() === TRUE) {
        echo "<p>Thank you for signing up, $name!</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }

    $stmt->close();
}

// Create products and users tables
$sql = "CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255),
    description TEXT,
    category VARCHAR(100),
    price DECIMAL(10, 2),
    stock_quantity INT
);

INSERT INTO products (name, description, category, price, stock_quantity) VALUES
('Product A', 'Description of Product A', 'Category1', 19.99, 100),
('Product B', 'Description of Product B', 'Category2', 29.99, 80),
('Product C', 'Description of Product C', 'Category1', 39.99, 150),
('Product D', 'Description of Product D', 'Category3', 49.99, 200),
('Product E', 'Description of Product E', 'Category2', 59.99, 60),
('Product F', 'Description of Product F', 'Category3', 69.99, 90);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO users (username, name, email, password) VALUES
('user1', 'User One', 'user1@example.com', md5('password1')),
('user2', 'User Two', 'user2@example.com', md5('password2')),
('user3', 'User Three', 'user3@example.com', md5('password3'));";

if ($conn->multi_query($sql) === TRUE) {
    echo "Tables created and seeded successfully";
} else {
    echo "Error creating tables: " . $conn->error;
}

// Create XML upload form
echo '
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Vintage Vogue Shoes Comic and Graphic Novel Library</title>
    <style>
        body {
            background-color: #7A3B00;
            text-align: center;
            color: #D4AF37;
            font-family: \'Courier New\', Courier, monospace;
        }
    </style>
</head>
<body>
    <h2>XML File Upload</h2>
    <form action="" method="post" enctype="multipart/form-data">
        Select file to upload:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <br>
        <input type="submit" value="Upload XML" name="submit">
    </form>
</body>
</html>';

// Handle XML file upload
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $xmlFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Allow only XML file formats
    if ($xmlFileType !== "xml") {
        echo "Sorry, only XML files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk === 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        // Attempt to upload the file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>