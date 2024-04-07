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

// Create table for feedback if not exists
$sql = "CREATE TABLE IF NOT EXISTS course_feedback (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
course_name VARCHAR(50) NOT NULL,
user_name VARCHAR(50),
rating INT(1),
feedback TEXT,
reg_date TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table course_feedback created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $course_name = $_POST["course_name"];
    $user_name = $_POST["user_name"];
    $rating = $_POST["rating"];
    $feedback = $_POST["feedback"];

    $sql = "INSERT INTO course_feedback (course_name, user_name, rating, feedback)
    VALUES ('$course_name', '$user_name', '$rating', '$feedback')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Feedback submitted successfully.')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Course Feedback</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .input-group {
            margin-bottom: 20px;
        }
        .input-group label, .input-group input, .input-group textarea, .input-group select {
            display: block;
            width: 100%;
        }
        .input-group textarea {
            resize: vertical;
        }
        .input-group label {
            margin-bottom: 5px;
        }
        .input-group input, .input-group select, .input-group textarea {
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }
        button {
            background-color: #0056b3;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        button:hover {
            background-color: #004095;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Leave Feedback for Our Online Courses</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="input-group">
                <label for="course_name">Course Name</label>
                <input type="text" id="course_name" name="course_name" required>
            </div>
            <div class="input-group">
                <label for="user_name">Your Name</label>
                <input type="text" id="user_name" name="user_name">
            </div>
            <div class="input-group">
                <label for="rating">Rating</label>
                <select id="rating" name="rating">
                    <option value="5">5 - Excellent</option>
                    <option value="4">4 - Very Good</option>
                    <option value="3">3 - Good</option>
                    <option value="2">2 - Fair</option>
                    <option value="1">1 - Poor</option>
                </select>
            </div>
            <div class="input-group">
                <label for="feedback">Feedback</label>
                <textarea id="feedback" name="feedback" rows="4" required></textarea>
            </div>
            <button type="submit">Submit Feedback</button>
        </form>
    </div>
</body>
</html>
