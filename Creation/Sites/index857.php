<?php
// DISCLAIMER: This code is for demonstration purposes only, and it's not production-ready. It lacks several important features such as input validation, error handling, and proper security measures including but not limited to password hashing, prevention of SQL injections, and cross-site scripting (XSS) attacks.

// Database configuration
$dbHost     = "db";
$dbUsername = "root";
$dbPassword = "root";
$dbName     = "my_database";

// Connect to database
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if they do not exist
$initSql = file_get_contents('init.sql'); // Assuming the init.sql file is in the same directory
if (!$conn->multi_query($initSql)) {
    echo "Error: " . $conn->error;
}

// Wait for multi queries to finish
do {
    if ($result = $conn->store_result()) {
        $result->free();
    }
} while ($conn->next_result());

// Handle form submissions
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['uploadSourceCode'])) {
        // Source code upload logic here
    } elseif (isset($_POST['login'])) {
        // User access login logic here
    } elseif (isset($_POST['addToWishlist'])) {
        // Add to wish list logic here
    } elseif (isset($_POST['searchForums'])) {
        // Search forums logic here
    } elseif (isset($_POST['uploadPortfolio'])) {
        // Portfolio upload logic here
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Desktop Computers Blog</title>
    <style>
        body { font-family: Arial, sans-serif; background-color: #e7f1ff; }
        .header, .footer { background-color: #004ba0; color: white; padding: 10px; text-align: center; }
        .container { padding: 20px; }
        input[type="submit"] { background-color: #004ba0; color: white; padding: 10px; border: none; cursor: pointer; }
        .blue-theme { color: #004ba0; }
    </style>
</head>
<body>
    <div class="header">
        <h1>Desktop Computers Blog</h1>
    </div>

    <div class="container">
        <h2 class="blue-theme">Source Code Upload</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="sourceCode">
            <input type="submit" name="uploadSourceCode" value="Upload">
        </form>

        <h2 class="blue-theme">User Access</h2>
        <form method="post">
            <input type="text" name="username" placeholder="Username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Login">
        </form>

        <h2 class="blue-theme">Add to Wish List</h2>
        <form method="post">
            <input type="number" name="productId" placeholder="Product ID">
            <input type="submit" name="addToWishlist" value="Add to Wishlist">
        </form>

        <h2 class="blue-theme">Search Forums</h2>
        <form method="get">
            <input type="text" name="searchTerm" placeholder="Search...">
            <input type="submit" name="searchForums" value="Search">
        </form>

        <h2 class="blue-theme">Portfolio Upload</h2>
        <form method="post" enctype="multipart/form-data">
            <input type="file" name="portfolio">
            <input type="submit" name="uploadPortfolio" value="Upload Portfolio">
        </form>
    </div>

    <div class="footer">
        <p>&copy; 2023 Desktop Computers Blog</p>
    </div>
</body>
</html>

<?php
// Close the database connection
$conn->close();
?>