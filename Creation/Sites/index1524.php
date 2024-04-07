<?php
// Establish database connection
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

// Create vocabulary table if not exists
$sql = "CREATE TABLE IF NOT EXISTS vocabulary (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    spanish VARCHAR(50) NOT NULL,
    english VARCHAR(50) NOT NULL,
    category VARCHAR(50),
    reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    echo "Table vocabulary created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $spanish = $_POST['spanish'];
    $english = $_POST['english'];
    $category = $_POST['category'];

    $sql = "INSERT INTO vocabulary (spanish, english, category) VALUES ('$spanish', '$english', '$category')";

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
    <title>Language Learning Content</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 90%; margin: auto; }
        form { margin-top: 20px; }
        label { display: block; margin-bottom: 5px; }
        input[type=text], select { width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 4px; }
        input[type=submit] { background-color: #4CAF50; color: white; padding: 15px 20px; border: none; border-radius: 4px; cursor: pointer; }
        input[type=submit]:hover { background-color: #45a049; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Vocabulary to Spanish for Beginners</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="spanish">Spanish Word:</label>
        <input type="text" id="spanish" name="spanish" required>

        <label for="english">English Translation:</label>
        <input type="text" id="english" name="english" required>

        <label for="category">Category:</label>
        <select id="category" name="category">
            <option value="General">General</option>
            <option value="Food">Food</option>
            <option value="Travel">Travel</option>
            <option value="Family">Family</option>
        </select>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>

<?php
$conn->close();
?>
