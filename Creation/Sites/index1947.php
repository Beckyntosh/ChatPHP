<?php
// Create connection
$conn = new mysqli('db', 'root', 'root', 'my_database');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS code_reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    feature_name VARCHAR(50) NOT NULL,
    code LONGTEXT NOT NULL,
    status ENUM('pending', 'reviewed') NOT NULL DEFAULT 'pending',
    review LONGTEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit_code'])) {
    $feature_name = $conn->real_escape_string($_POST['feature_name']);
    $code = $conn->real_escape_string($_POST['code']);

    $insertSQL = "INSERT INTO code_reviews (feature_name, code) VALUES ('$feature_name', '$code')";

    if ($conn->query($insertSQL) === TRUE) {
        echo "<p>Code submitted successfully for review.</p>";
    } else {
        echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Code Review System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        textarea {
            width: 100%;
            height: 200px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Submit Code for Review</h2>
    <form method="POST" action="">
        <label for="feature_name">Feature Name:</label><br>
        <input type="text" id="feature_name" name="feature_name" required><br><br>
        <label for="code">Source Code:</label><br>
        <textarea id="code" name="code" required></textarea><br><br>
        <input type="submit" name="submit_code" value="Submit for Review">
    </form>
</div>

<div class="container">
    <h2>Submitted Codes for Review</h2>
    <?php
    $sql = "SELECT id, feature_name, status FROM code_reviews";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table border='1'><tr><th>ID</th><th>Feature Name</th><th>Status</th></tr>";
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["feature_name"] . "</td>
                    <td>" . $row["status"] . "</td>
                  </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
