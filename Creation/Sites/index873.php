<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

function createDatabaseConnection($servername, $username, $password, $dbname) {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    return $conn;
}

function closeDatabaseConnection(&$conn) {
    $conn->close();
}

function setupInitialDatabase($conn) {
    $queries = [
        "CREATE TABLE IF NOT EXISTS courses (id INT AUTO_INCREMENT PRIMARY KEY, name VARCHAR(255))",
        "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255),
            description TEXT,
            category VARCHAR(100),
            price DECIMAL(10, 2),
            stock_quantity INT
          )",
        "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(30),
            name VARCHAR(30),
            email VARCHAR(50),
            password VARCHAR(255)
          )",
        "CREATE TABLE IF NOT EXISTS uploads (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100),
            mimetype VARCHAR(100),
            data LONGBLOB
          )",
        // Remove INSERT statements to avoid duplicated rows on each request
    ];

    foreach ($queries as $query) {
        if (!$conn->query($query)) {
            echo "Error: " . $conn->error;
        }
    }
}

$conn = createDatabaseConnection($servername, $username, $password, $dbname);
setupInitialDatabase($conn);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Multi-Purpose Site</title>
    <style>
        body {
            background-color: #6699CC;
            color: #FFFFFF;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            font-size: 24px;
        }
        form {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <h1>Camera Course Creation</h1>
    <form method="post">
        <label for="name">Course Name:</label><br>
        <input type="text" id="name" name="name"><br>
        <input type="submit" value="Create">
    </form>

    <h1>Register New User</h1>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username">
        <br>
        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name">
        <br>
        <label for="user_email">Email:</label>
        <input type="email" id="user_email" name="user_email">
        <br>
        <label for="user_password">Password:</label>
        <input type="password" id="user_password" name="user_password">
        <br>
        <input type="submit" value="Register User" name="register_user">
    </form>

    <h1>Maternity Wear News</h1>
    <form method="get">
        <input type="text" name="search" placeholder="Search items...">
        <button type="submit">Search</button>
    </form>

    <h1>Upload a Book PDF</h1>
    <form method="post" enctype="multipart/form-data">
        <input type="file" name="userfile">
        <input type="submit" value="Upload PDF" name="upload_pdf">
    </form>

    <h1>Winter Themed Makeup News</h1>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['name'])) {
    $name = $_POST["name"];
    $sql = "INSERT INTO courses (name) VALUES ('$name')";
    if ($conn->query($sql) === TRUE) {
        echo "New course created successfully<br>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register_user'])) {
    $username = $_POST['username'];
    $name = $_POST['user_name'];
    $email = $_POST['user_email'];
    $password = $_POST['user_password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $stmt = $conn->prepare("INSERT INTO users (username, name, email, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $name, $email, $hashed_password);
    $stmt->execute();
    echo "New user registered successfully<br>";
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['upload_pdf'])) {
    $name = $_FILES['userfile']['name'];
    $mimetype = $_FILES['userfile']['type'];

    if ($mimetype == 'application/pdf') {
        $data = file_get_contents($_FILES['userfile']['tmp_name']);
        $stmt = $conn->prepare("INSERT INTO uploads (name, mimetype, data) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $mimetype, $data);
        $stmt->execute();
        echo "PDF uploaded successfully<br>";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['search'])) {
    $search = $_GET['search'];
    $stmt = $conn->prepare("SELECT * FROM products WHERE name LIKE CONCAT('%',?,'%') OR description LIKE CONCAT('%',?,'%')");
    $stmt->bind_param("ss", $search, $search);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div><h2>" . $row["name"] . "</h2><p>" . $row["description"]
            . "</p><p>Category: " . $row["category"] . "</p><p>Price: $"
            . $row["price"] . "</p><p>Stock quantity: " . $row["stock_quantity"]
            . "</p></div><hr>";
        }
    } else {
        echo "No products found";
    }
} else {
    $sql = "SELECT * FROM products";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div><h2>" . $row["name"] . "</h2><p>" . $row["description"]
            . "</p><p>Category: " . $row["category"] . "</p><p>Price: $"
            . $row["price"] . "</p><p>Stock quantity: " . $row["stock_quantity"]
            . "</p></div><hr>";
        }
    } else {
        echo "No products found";
    }
}

closeDatabaseConnection($conn);

?>

</body>
</html>
