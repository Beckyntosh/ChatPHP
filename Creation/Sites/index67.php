<?php
// Check if the user has submitted search
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['searchTerm'])) {
    // Database configuration
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbname = "my_database";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }

    // Prepare statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM legal_documents WHERE content LIKE ?");
    $searchTerm = "%".$_POST['searchTerm']."%";
    $stmt->bind_param("s", $searchTerm);

    // Execute statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

    // Close statement
    $stmt->close();
    
    // Close connection
    $conn->close();
} else {
    $result = null;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Legal Documents Search</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .search-box { margin-bottom: 20px; }
        .document { margin-bottom: 10px; border: 1px solid #ccc; padding: 10px; }
    </style>
</head>
<body>
    <h1>Search Legal Documents</h1>
    <form class="search-box" action="" method="POST">
        <input type="text" name="searchTerm" placeholder="Enter search term...">
        <button type="submit">Search</button>
    </form>

    <?php if (isset($result) && $result->num_rows > 0): ?>
        <h2>Search Results</h2>
        <?php while($row = $result->fetch_assoc()): ?>
            <div class="document">
                <h3><?php echo htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo nl2br(htmlspecialchars($row['content'], ENT_QUOTES, 'UTF-8')); ?></p>
            </div>
        <?php endwhile; ?>
    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>
        <p>No documents found.</p>
    <?php endif; ?>
</body>
</html>