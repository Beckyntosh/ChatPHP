<?php
$serverName = "db";
$username = "root";
$password = "root";
$dbName = "my_database";

$conn = new mysqli($serverName, $username, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csv_file"])) {
    $fileName = $_FILES["csv_file"]["tmp_name"];
    
    if ($_FILES["csv_file"]["size"] > 0) {
        $file = fopen($fileName, "r");
        
        while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
            $sqlInsert = "INSERT into customers (customer_name, contact_name, country)
                   values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "')";
            $result = mysqli_query($conn, $sqlInsert);
            
            if (!empty($result)) {
                $type = "success";
                $message = "CSV Data Imported into the Database";
            } else {
                $type = "error";
                $message = "Problem in Importing CSV Data";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body{
            font-family: Arial, sans-serif;
            background-color: peachpuff;
            color: teal;
            padding: 20px;
        }
        .submit-button {
            background-color: teal;
            color: white;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: darkcyan;
        }
        .container {
            background-color: lavenderblush;
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>

<h2>Upload CSV File</h2>

<div class="container">
    <form class="form-horizontal" action="" method="post" name="uploadCSV"
        enctype="multipart/form-data">
        <div class="input-row">
            <label>Choose CSV File</label>
            <input type="file" name="csv_file" id="csv_file" accept=".csv">
            <button type="submit" id="submit" name="import" class="submit-button">Import</button>
            <br />
        </div>
    </form>
</div>

<?php
if (!empty($message)) {
    echo "<p>$message</p>";
}
?>
</body>
</html>
