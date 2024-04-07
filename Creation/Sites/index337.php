<?php
// Simple Address Book Management with Import/Export Options for Shoes Website

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

// Create table if not exists
$sql = "CREATE TABLE IF NOT EXISTS contacts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
phone VARCHAR(20),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql) === TRUE) {
  //echo "Table Contacts created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle File Import
if(isset($_FILES['fileToUpload'])){
    $filename=$_FILES["fileToUpload"]["tmp_name"];    

    if($_FILES["fileToUpload"]["size"] > 0)
    {
        $file = fopen($filename, "r");
        
        while (($getData = fgetcsv($file, 10000, ",")) !== FALSE)
        {
            $sql = "INSERT into contacts (firstname, lastname, email, phone) 
                   values ('".$getData[0]."','".$getData[1]."','".$getData[2]."','".$getData[3]."')";
            if(!$result = $conn->query($sql)){
                echo "Error on insert: " . $conn->error;
            }
        }
        
        fclose($file);  
    }
}

// Export contacts to CSV
if(isset($_POST["export"])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=contacts.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('ID', 'First Name', 'Last Name', 'Email', 'Phone Number', 'Registration Date'));
    $query = "SELECT * from contacts ORDER BY id DESC";
    $result = $conn->query($query);
    while($row = $result->fetch_assoc()) {
        fputcsv($output, $row);
    }
    fclose($output);
    exit();    
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Address Book Management</title>
</head>
<body>

<h2>Import Contacts to Address Book</h2>
<form action="index.php" method="post" enctype="multipart/form-data">
    Select .csv file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Import CSV" name="submit">
</form>

<h2>Export Contacts from Address Book</h2>
<form action="index.php" method="post">
    <input type="submit" value="Export to CSV" name="export">
</form>

</body>
</html>