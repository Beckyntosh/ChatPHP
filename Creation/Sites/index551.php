<?php
// Connect to Database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Check if the table exists, if not create it
$checkTable = "CREATE TABLE IF NOT EXISTS posts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255),
  content TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";

if (!$conn->query($checkTable)) {
  die("Error creating table: " . $conn->error);
}

// Functionality to add a new post
function addPost($title, $content, $conn) {
  $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
  $stmt->bind_param("ss", $title, $content);
  
  if ($stmt->execute()) {
    echo "<p style='color: green;'>New Post Added Successfully!</p>";
  } else {
    echo "<p style='color: red;'>Error Adding Post: " . $stmt->error . "</p>";
  }

  $stmt->close();
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $postTitle = $_POST["title"];
  $postContent = $_POST["content"];
  
  addPost($postTitle, $postContent, $conn);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Wines Charity - Add Post</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5deb3;
            color: #8b4513;
        }
        .container {
            max-width: 600px;
            margin: auto;
            background: #ffefd5;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #8b4513;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            opacity: 0.9;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Add a New Post</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" required>
        
        <label for="content">Content:</label>
        <textarea id="content" name="content" required></textarea>
        
        <input type="submit" value="Add Post">
    </form>
</div>

</body>
</html>