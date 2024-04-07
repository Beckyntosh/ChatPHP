<?php
// Connect to Database
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

// Create tables if they do not exist
$sql = "CREATE TABLE IF NOT EXISTS Users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS BrowsingHistory (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    user_id INT(6) UNSIGNED,
    product_id INT(6) UNSIGNED,
    viewed_on TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES Users(id)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS Products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50),
    category VARCHAR(50)
)";

if (!$conn->query($sql) === TRUE) {
    echo "Error creating table: " . $conn->error;
}

// Handle user signup
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = $conn->prepare("INSERT INTO Users (email) VALUES (?)");
    $sql->bind_param("s", $email);

    if ($sql->execute() === TRUE) {
        echo "User registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql->close();
}

// Handle user browsing history update
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['user_id']) && isset($_POST['product_id'])) {
    $user_id = $_POST['user_id'];
    $product_id = $_POST['product_id'];

    $sql = $conn->prepare("INSERT INTO BrowsingHistory (user_id, product_id) VALUES (?, ?)");
    $sql->bind_param("ii", $user_id, $product_id);

    if ($sql->execute() === TRUE) {
        echo "Browsing history updated successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $sql->close();
}

// Fetch and display personalized recommendations
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    $sql = "SELECT DISTINCT P.id, P.name, P.category FROM Products P
            JOIN BrowsingHistory BH ON P.id = BH.product_id
            WHERE BH.user_id = $user_id
            ORDER BY BH.viewed_on DESC LIMIT 5";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "id: " . $row["id"]. " - Name: " . $row["name"]. " - Category: " . $row["category"]. "<br>";
        }
    } else {
        echo "0 results";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Recommendations</title>
</head>
<body>

<h2>User Signup</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  Email: <input type="text" name="email">
  <input type="submit">
</form>

<h2>Update Browsing History</h2>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
  User ID: <input type="text" name="user_id">
  Product ID: <input type="text" name="product_id">
  <input type="submit">
</form>

<h2>Get Recommendations</h2>
<form method="get" action="<?php echo $_SERVER['PHP_SELF'];?>">
  User ID: <input type="text" name="user_id">
  <input type="submit" value="Get Recommendations">
</form>

</body>
</html>
