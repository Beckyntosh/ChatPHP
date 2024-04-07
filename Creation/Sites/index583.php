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

// Create tables if they don't exist
$initSQL = [
  "CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    product_id INT,
    comment TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
  )",
  "INSERT INTO comments (user_id, product_id, comment) VALUES
  (1, 1, 'Great tablet for e-learning!'),
  (2, 3, 'Really helpful in online tutoring sessions.'),
  (3, 2, 'Battery life could be better.');"
];

foreach ($initSQL as $query) {
  if (!$conn->query($query)) {
    echo "Error creating table or inserting data: " . $conn->error;
  }
}

$search = $_GET['search'] ?? '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tablets Online Tutoring and Coaching Service</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0e4d7;
            color: #5d3a3a;
        }
        .container {
            width: 80%;
            margin: auto;
            overflow: hidden;
        }
        header {
            background: #50a3a2;
            color: #ffffff;
            padding-top: 30px;
            min-height: 70px;
            border-bottom: #077187 1px solid;
        }
        header h1 {
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 3px;
        }
        .content {
            display: flex;
            justify-content: space-between;
        }
        .content .sidebar {
            width: 30%;
            background: #f0e4d7;
            padding: 20px;
        }
        .content .main {
            width: 70%;
            background: #ffffff;
            padding: 20px;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            padding: 20px;
            color: #ffffff;
            background-color: #50a3a2;
        }
    </style>
</head>
<body>
    <header>
        <h1>Tablets Online Tutoring and Coaching Service</h1>
    </header>

    <div class="container">
        <div class="sidebar">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Search comments" value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Search</button>
            </form>
        </div>
        <div class="main">
            <?php
            if ($search) {
                $stmt = $conn->prepare("SELECT * FROM comments WHERE comment LIKE CONCAT('%',?,'%')");
                $stmt->bind_param("s", $search);
                $stmt->execute();
                $result = $stmt->get_result();

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
                    }
                } else {
                    echo "<p>No comments found.</p>";
                }
            } else {
                echo "<p>Type something to search in comments.</p>";
            }
            ?>
        </div>
    </div>

    <div class="footer">
        © 2023 Tablets Online Tutoring and Coaching Service
    </div>
</body>
</html>
<?php
$conn->close();
?>