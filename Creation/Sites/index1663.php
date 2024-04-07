<?php

// Database connection
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

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["csvFile"])) {
  $filename = $_FILES["csvFile"]["tmp_name"];

  // Check if file is not empty
  if ($_FILES["csvFile"]["size"] > 0) {
    $file = fopen($filename, "r");

    // Skip first row (column headers)
    fgetcsv($file);
    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      // SQL Query to insert data into Customer table
      $sqlInsert = "INSERT into customers (name,email,contact_number,address,registered_at)
               values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";
      
      $result = $conn->query($sqlInsert);
      
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

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Import CSV file into MySQL database</title>
    <style>
        body {
            font-family: Arial;
            width: 550px;
        }

        .outer-container {
            background: #F0F0F0;
            border: #e0dfdf 1px solid;
            padding: 40px 20px;
            border-radius: 2px;
        }

        .btn-submit {
            background: #333;
            border: #1d1d1d 1px solid;
            color: #f0f0f0;
            cursor: pointer;
            padding: 10px 20px;
            border-radius: 2px;
        }

        .tutorial-table {
            margin-top: 40px;
            font-size: 0.8em;
            border-collapse: collapse;
            width: 100%;
        }

        .tutorial-table th {
            background: #f0f0f0;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .tutorial-table td {
            background: #FFF;
            border-bottom: 1px solid #dddddd;
            padding: 8px;
            text-align: left;
        }

        .message {
            color: #ff0000;
            text-align: center;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <h2>Import Customer List CSV File</h2>

    <div class="outer-container">
        <form action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
            <div>
                <label>Choose CSV File</label> <input type="file" name="csvFile" id="csvFile" accept=".csv">
                <button type="submit" id="submit" name="import" class="btn-submit">Import</button>
            </div>
        </form>
    </div>
</body>
</html>
