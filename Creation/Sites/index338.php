<?php
// Database configuration
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'my_database');

// Connect to the database
$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create table if not exists
$tableCreationQuery = "CREATE TABLE IF NOT EXISTS contacts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    phone VARCHAR(20),
    reg_date TIMESTAMP
)";
$conn->query($tableCreationQuery);

// Check for form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['contactFile'])) {
        // If file is uploaded
        $filename = $_FILES['contactFile']['tmp_name'];
        if ($_FILES['contactFile']['size'] > 0) {
            $file = fopen($filename, "r");
            while (($importData = fgetcsv($file, 10000, ",")) !== FALSE) {
                $sql = "INSERT into contacts (firstname, lastname, email, phone) values ('$importData[0]','$importData[1]','$importData[2]','$importData[3]')";
                $conn->query($sql);
            }
            fclose($file);
        }
    } elseif (isset($_POST['export'])) {
        // Export contacts to CSV
        header('Content-Type: text/csv; charset=utf-8');
        header('Content-Disposition: attachment; filename=contacts.csv');
        $output = fopen("php://output", "w");
        fputcsv($output, array('First Name', 'Last Name', 'Email', 'Phone'));
        $query = "SELECT firstname, lastname, email, phone FROM contacts ORDER BY reg_date DESC";
        $result = $conn->query($query);
        while($row = $result->fetch_assoc()) {
            fputcsv($output, $row);
        }
        fclose($output);
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Address Book Management</title>
</head>
<body>
<h2>Address Book</h2>

Upload form
<form method="post" enctype="multipart/form-data">
    <label for="contactFile">Import Contacts:</label>
    <input type="file" name="contactFile" id="contactFile" required>
    <button type="submit">Import</button>
</form>

Export Button
<form method="post">
    <button type="submit" name="export" value="1">Export</button>
</form>

Display contacts
<table border="1">
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Email</th>
        <th>Phone</th>
    </tr>
    <?php
        $sql = "SELECT firstname, lastname, email, phone FROM contacts";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr><td>" . htmlspecialchars($row['firstname']) . "</td><td>" . htmlspecialchars($row['lastname']) . "</td><td>" . htmlspecialchars($row['email']) . "</td><td>" . htmlspecialchars($row['phone']) . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='4'>No contacts found</td></tr>";
        }
    ?>
</table>
</body>
</html>

<?php
$conn->close();
?>