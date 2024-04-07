<?php
// Establish database connection
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

// Create table for uploaded data if it does not exist
$sql = "CREATE TABLE IF NOT EXISTS craft_beer_data (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
beer_name VARCHAR(30) NOT NULL,
brewery VARCHAR(30) NOT NULL,
style VARCHAR(50),
alcohol_content DECIMAL(4,2),
ibu INT(3),
reg_date TIMESTAMP
)";

if ($conn->query($sql) !== TRUE) {
  echo "Error creating table: " . $conn->error;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_FILES["spreadsheetFile"]["name"])) {
  $fileName = $_FILES["spreadsheetFile"]["tmp_name"];
  
  if ($_FILES["spreadsheetFile"]["size"] > 0) {
    $file = fopen($fileName, "r");

    while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
      $sqlInsert = "INSERT into craft_beer_data (beer_name, brewery, style, alcohol_content, ibu)
                    values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "'," . $column[3] . "," . $column[4] . ")";
      
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
?>

<!DOCTYPE html>
<html>
<head>
  <title>Upload Spreadsheet - Craft Beers Data Visualization</title>
  <style>
    body{font-family: Arial; padding: 10px;}
    .upload-container{background: #f7f8f9; border: 1px solid #ccc; padding: 20px;}
    .btn-submit{background: #333; color: #fff; padding: 10px; border: 0; cursor: pointer;}
    .message{margin-bottom: 20px; padding: 10px; color: #333;}
    .success{background: #c7ffc8;}
    .error{background: #ffcccc;}
  </style>
</head>
<body>

<div class="upload-container">
  <h2>Upload Spreadsheet - Craft Beers</h2>
  
  <div class="message <?php echo ($type == "success") ? "success" : "error"; ?>">
    <?php if (!empty($message)) { echo $message; } ?>
  </div>
  
  <form action="" method="post" enctype="multipart/form-data">
    <label>Choose CSV File</label>
    <input type="file" name="spreadsheetFile" id="spreadsheetFile" accept=".csv">
    <button type="submit" class="btn-submit">Upload</button>
  </form>
</div>

</body>
</html>

<?php $conn->close(); ?>