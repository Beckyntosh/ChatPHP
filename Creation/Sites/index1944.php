<?php
// Set up database connection
$servername = "db";
$username = "root";
$password = "root";
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists; if not, create it
$checkTable = "SHOW TABLES LIKE 'code_reviews'";
$result = $conn->query($checkTable);

if($result->num_rows == 0) {
    $createTable = "CREATE TABLE code_reviews (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        feature_name VARCHAR(30) NOT NULL,
        code TEXT NOT NULL,
        status VARCHAR(10) DEFAULT 'PENDING',
        reg_date TIMESTAMP
    )";

    if ($conn->query($createTable) === TRUE) {
        echo "Table code_reviews created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $feature_name = $_POST['feature_name'];
    $code = $_POST['code'];

    $sql = "INSERT INTO code_reviews (feature_name, code)
    VALUES ('". $feature_name ."', '". $code ."')";

    if ($conn->query($sql) === TRUE) {
        echo "New code review submitted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Code Review Upload</title>
</head>
<body>
    <h2>Submit Code for Review</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
        <label for="feature_name">Feature Name:</label><br>
        <input type="text" id="feature_name" name="feature_name" required><br>
        <label for="code">Code:</label><br>
        <textarea id="code" name="code" rows="15" cols="50" required></textarea><br>
        <input type="submit" value="Submit">
    </form>

    <h2>Code Reviews</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Feature Name</th>
            <th>Status</th>
            <th>Date</th>
        </tr>
    
<?php
$sql = "SELECT id, feature_name, status, reg_date FROM code_reviews";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["feature_name"]. "</td><td>" . $row["status"]. "</td><td>" . $row["reg_date"]. "</td></tr>";
    }
} else {
    echo "<tr><td colspan='4'>0 results</td></tr>";
}
$conn->close();
?>
    </table>
</body>
</html>
