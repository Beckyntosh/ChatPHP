<?php
// Set up database connection
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

// Create table if it doesn't exist
$table = "CREATE TABLE IF NOT EXISTS course_feedback (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  course_name VARCHAR(50) NOT NULL,
  user_email VARCHAR(50),
  rating INT(1) NOT NULL,
  feedback TEXT,
  reg_date TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  echo "";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $course_name = $_POST["course_name"];
  $user_email = $_POST["user_email"];
  $rating = $_POST["rating"];
  $feedback = $_POST["feedback"];

  $sql = "INSERT INTO course_feedback (course_name, user_email, rating, feedback)
  VALUES ('$course_name', '$user_email', '$rating', '$feedback')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
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
    <title>Course Feedback Form</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        input[type=text], input[type=email], select, textarea {
            width: 100%;
            padding: 12px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type=submit]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Online Course Feedback</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <label for="course_name">Course Name</label>
            <input type="text" id="course_name" name="course_name" required>

            <label for="user_email">Email</label>
            <input type="email" id="user_email" name="user_email" required>

            <label for="rating">Rating</label>
            <select id="rating" name="rating">
                <option value="1">1 - Poor</option>
                <option value="2">2 - Fair</option>
                <option value="3">3 - Good</option>
                <option value="4">4 - Very Good</option>
                <option value="5">5 - Excellent</option>
            </select>

            <label for="feedback">Feedback</label>
            <textarea id="feedback" name="feedback" rows="4"></textarea>

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
