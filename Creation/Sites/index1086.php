<?php
// Create connection
$conn = new mysqli("db", "root", "root", "my_database");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "CREATE TABLE IF NOT EXISTS fitness_classes (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table fitness_classes created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

$sql = "CREATE TABLE IF NOT EXISTS class_ratings (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
class_id INT(6) UNSIGNED,
rating INT(1),
feedback TEXT,
FOREIGN KEY (class_id) REFERENCES fitness_classes(id)
)";

if ($conn->query($sql) === TRUE) {
    // echo "Table class_ratings created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}

// Insert Class
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addClass'])) {
    $stmt = $conn->prepare("INSERT INTO fitness_classes (class_name, description) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['className'], $_POST['classDescription']);
    $stmt->execute();
    $stmt->close();
}

// Insert Rating
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['addRating'])) {
    $stmt = $conn->prepare("INSERT INTO class_ratings (class_id, rating, feedback) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $_POST['classId'], $_POST['rating'], $_POST['feedback']);
    $stmt->execute();
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Class Rating</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px; }
        form { background-color: #fff; padding: 20px; border-radius: 8px; }
        input, select, textarea { margin-bottom: 10px; width: 100%; padding: 10px; border-radius: 4px; border: 1px solid #ddd; }
        label { font-weight: bold; }
        button { padding: 10px 20px; background-color: #0056b3; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background-color: #004494; }
    </style>
</head>
<body>
    <h1>Add a Fitness Class</h1>
    <form method="POST">
        <label for="className">Class Name:</label>
        <input type="text" id="className" name="className" required>
        
        <label for="classDescription">Class Description:</label>
        <textarea id="classDescription" name="classDescription" required></textarea>
        
        <button type="submit" name="addClass">Add Class</button>
    </form>

    <h1>Rate a Class</h1>
    <form method="POST">
        <label for="classId">Class Name:</label>
        <select id="classId" name="classId" required>
            <option value="">Select a Class</option>
            <?php
            $classes = $conn->query("SELECT id, class_name FROM fitness_classes");
            while($row = $classes->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['class_name'] . "</option>";
            }
            ?>
        </select>
        
        <label for="rating">Rating (1-5):</label>
        <select id="rating" name="rating" required>
            <option value="">Select a Rating</option>
            <option value="1">1 - Poor</option>
            <option value="2">2 - Fair</option>
            <option value="3">3 - Good</option>
            <option value="4">4 - Very Good</option>
            <option value="5">5 - Excellent</option>
        </select>
        
        <label for="feedback">Feedback:</label>
        <textarea id="feedback" name="feedback"></textarea>
        
        <button type="submit" name="addRating">Rate Class</button>
    </form>

</body>
</html>
<?php
$conn->close();
?>
