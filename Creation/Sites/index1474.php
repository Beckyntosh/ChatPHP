<?php
// Simple database backup upload script for restoration service
// Note: This script does not implement security checks for simplification. Ensure to add authentication and validation in production.

// Database credentials
define('MYSQL_ROOT_PSWD', 'root');
define('MYSQL_DB', 'my_database');
define('MYSQL_SERVER', 'db');

// Simple HTML markup for Claude Shannon inspired bath products website
echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bath Products - Database Backup Upload</title>
    <style>
        body { font-family: "Courier New", Courier, monospace; background-color: #f0f8ff; }
        .container { text-align: center; padding: 50px; }
        h1 { color: #333; }
        .upload-form { margin-top: 20px; }
        input, button { margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Claude Shannon Bath Products Admin</h1>
        <p>Upload Database Backup for Restoration</p>
        <form method="POST" enctype="multipart/form-data" class="upload-form">
            <input type="file" name="dbBackup" required>
            <button type="submit" name="uploadBackup">Upload Backup</button>
        </form>
    </div>
</body>
</html>';

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["uploadBackup"])) {
    // Assuming uploaded file is a MySQL dump
    $backupFile = $_FILES["dbBackup"]["tmp_name"];
    
    // Ensure file is provided
    if ($backupFile && file_exists($backupFile)) {
        $command = "mysql -h " . MYSQL_SERVER . " -u root --password='" . MYSQL_ROOT_PSWD . "' " . MYSQL_DB . " < " . $backupFile;

        // Execute command to restore database
        system($command, $output);

        // Check for success
        if ($output === 0) {
            echo "<p>Database restored successfully.</p>";
        } else {
            echo "<p>Error in restoring the database.</p>";
        }
    } else {
        echo "<p>Error: No file uploaded.</p>";
    }
}
?>
