<?php
// Connection to the database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Establishing connection with the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Creating legal_documents table if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS legal_documents (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    reg_date TIMESTAMP
)";

if (!$conn->query($sql) === TRUE) {
    die("Error creating table: " . $conn->error);
}

// Handling the search request
$search = $_GET['search'] ?? '';
$documents = [];
if (!empty($search)) {
    $stmt = $conn->prepare("SELECT * FROM legal_documents WHERE title LIKE ? OR content LIKE ?");
    $likeSearch = "%" . $search . "%";
    $stmt->bind_param("ss", $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();

    while($row = $result->fetch_assoc()) {
        $documents[] = $row;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Documents Search</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            color: #333;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .search {
            margin-bottom: 20px;
        }
        .document {
            border: 1px solid #ddd;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }
        .title {
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <form class="search" action="">
        <input type="text" name="search" placeholder="Search documents...">
        <button type="submit">Search</button>
    </form>

    <?php foreach ($documents as $document): ?>
        <div class="document">
            <div class="title"><?= htmlspecialchars($document['title']) ?></div>
            <div class="content"><?= htmlspecialchars($document['content']) ?></div>
        </div>
    <?php endforeach; ?>
</div>

</body>
</html>