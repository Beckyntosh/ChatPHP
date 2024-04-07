<!DOCTYPE html>
<html>
<head>
    <title>Employee Performance Review System</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        th { background-color: #f2f2f2; }
        .feedback-form { margin-top: 20px; }
        label { display: block; margin: 10px 0 5px; }
        input, select, textarea { width: 100%; margin-bottom: 20px; padding: 10px; }
        button { background-color: #4CAF50; color: white; padding: 10px 15px; border: none; cursor: pointer; }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>
    <h1>Employee Performance Review System</h1>

    <div class="feedback-form">
        <h2>Submit Review</h2>
        <form action="" method="post">
            <label for="reviewer">Reviewer:</label>
            <input type="text" name="reviewer" required>
            
            <label for="employee">Employee:</label>
            <input type="text" name="employee" required>

            <label for="rating">Rating (1-5):</label>
            <select name="rating">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5" selected>5</option>
            </select>

            <label for="feedback">Feedback:</label>
            <textarea name="feedback" rows="5" required></textarea>

            <button type="submit" name="submit">Submit Review</button>
        </form>
    </div>

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

    // handling form submission
    if(isset($_POST['submit'])) {
        $reviewer = $conn->real_escape_string($_POST['reviewer']);
        $employee = $conn->real_escape_string($_POST['employee']);
        $rating = (int)$_POST['rating'];
        $feedback = $conn->real_escape_string($_POST['feedback']);
        
        $sql = "INSERT INTO reviews (reviewer, employee, rating, feedback) VALUES ('$reviewer', '$employee', $rating, '$feedback')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<p>Review successfully submitted!</p>";
        } else {
            echo "<p>Error submitting review: " . $conn->error . "</p>";
        }
    }

    // Create database and table if not exists
    $dbCheckSql = "CREATE DATABASE IF NOT EXISTS my_database";
    $conn->query($dbCheckSql);

    $conn->select_db($dbname);

    // sql to create table
    $tableCheckSql = "CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    reviewer VARCHAR(30) NOT NULL,
    employee VARCHAR(30) NOT NULL,
    rating INT(1) NOT NULL,
    feedback TEXT NOT NULL,
    reg_date TIMESTAMP
    )";

    if ($conn->query($tableCheckSql) !== TRUE) {
        echo "Error creating table: " . $conn->error;
    }

    $sql = "SELECT id, reviewer, employee, rating, feedback, reg_date FROM reviews ORDER BY reg_date DESC";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<h2>Latest Reviews</h2>";
        echo "<table><tr><th>Reviewer</th><th>Employee</th><th>Rating</th><th>Feedback</th><th>Time</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>".$row["reviewer"]."</td>
            <td>".$row["employee"]."</td>
            <td>".$row["rating"]."</td>
            <td>".$row["feedback"]."</td>
            <td>".$row["reg_date"]."</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>
</html>
