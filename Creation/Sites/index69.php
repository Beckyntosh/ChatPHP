<?php
$MYSQL_ROOT_PSWD = 'root';
$MYSQL_DB = 'my_database';
$servername = 'db';

// Connect to the database
$con = new mysqli($servername, 'root', $MYSQL_ROOT_PSWD, $MYSQL_DB);

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Create table for legal documents if it does not exist
$tableSql = "CREATE TABLE IF NOT EXISTS legal_docs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    upload_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
)";
$con->query($tableSql);

// Handle search
$search = $_GET['search'] ?? '';
$docs = [];
if (!empty($search)) {
    $stmt = $con->prepare("SELECT * FROM legal_docs WHERE title LIKE ? OR content LIKE ?");
    $likeSearch = '%' . $search . '%';
    $stmt->bind_param("ss", $likeSearch, $likeSearch);
    $stmt->execute();
    $result = $stmt->get_result();
    $docs = $result->fetch_all(MYSQLI_ASSOC);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Legal Documents Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { max-width: 600px; margin: auto; padding: 20px; }
        .search-box { margin-bottom: 20px; }
        .doc { margin-bottom: 15px; padding: 10px; background-color: #f9f9f9; }
        .doc-title { font-size: 18px; color: #333; }
        .doc-date { font-size: 12px; color: #666; }
        .doc-content { font-size: 14px; color: #444; }
    </style>
</head>
<body>
    <div class="container">
        <form class="search-box" method="GET" action="">
            <input type="text" name="search" placeholder="Search for legal documents..." value="<?= htmlspecialchars($search) ?>">
            <button type="submit">Search</button>
        </form>
        <?php foreach ($docs as $doc): ?>
            <div class="doc">
                <div class="doc-title"><?= htmlspecialchars($doc['title']) ?></div>
                <div class="doc-date"><?= htmlspecialchars($doc['upload_date']) ?></div>
                <div class="doc-content"><?= nl2br(htmlspecialchars($doc['content'])) ?></div>
            </div>
        <?php endforeach; ?>
        <?php if (empty($docs) && !empty($search)): ?>
            <p>No legal documents found related to your search.</p>
        <?php endif; ?>
    </div>
</body>
</html>
<?php $con->close(); ?>