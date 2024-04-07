<?php
// Define the database connection settings
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Connect to the MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

// Create table for invoices if it doesn't exist
$createTable = "CREATE TABLE IF NOT EXISTS invoices (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filepath VARCHAR(255) NOT NULL,
    uploaded_at DATETIME DEFAULT CURRENT_TIMESTAMP
)";

if (!mysqli_query($link, $createTable)) {
    die("ERROR: Could not create table. " . mysqli_error($link));
}

$msg = "";

// Check if a file has been uploaded
if(isset($_POST['upload'])){
    $targetDir = "uploads/";
    $fileName = basename($_FILES["invoice"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

    if(move_uploaded_file($_FILES["invoice"]["tmp_name"], $targetFilePath)){
        // Insert file info into the database
        $insert = $link->query("INSERT into invoices (filename, filepath) VALUES ('".$fileName."', '".$targetFilePath."')");
        if($insert){
            $msg = "The file ".$fileName. " has been uploaded.";
        } else{
            $msg = "File upload failed, please try again.";
        } 
    } else{
        $msg = "Sorry, there was an error uploading your file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Invoice Upload - Art Supplies Website</title>
</head>
<body>
<h2>Upload Invoice</h2>
<form action="" method="post" enctype="multipart/form-data">
    <label>Select Invoice to Upload:</label>
    <input type="file" name="invoice">
    <input type="submit" name="upload" value="Upload Invoice">
</form>

<?php
// Display upload status
echo $msg;
?>

<h2>Uploaded Invoices</h2>
<table border="1">
<tr>
    <th>Invoice Name</th>
    <th>View</th>
</tr>
<?php
// Query to select all files from the database
$sql = "SELECT * FROM invoices";
$result = mysqli_query($link, $sql);

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>".$row['filename']."</td>";
        echo "<td><a href='".$row['filepath']."' target='_blank'>View File</a></td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='2'>No invoices found</td></tr>";
}
?>
</table>

</body>
</html>
<?php
// Close the MySQL connection
mysqli_close($link);
?>