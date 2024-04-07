<?php
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
$table_sql = "CREATE TABLE IF NOT EXISTS clients (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
company_name VARCHAR(50) NOT NULL,
contact_name VARCHAR(50),
contact_email VARCHAR(50),
reg_date TIMESTAMP
)";

if ($conn->query($table_sql) === TRUE) {
  // echo "Table clients created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

// Handle POST request
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $companyName = $_POST['companyName'];
    $contactName = $_POST['contactName'];
    $contactEmail = $_POST['contactEmail'];

    $insert_sql = "INSERT INTO clients (company_name, contact_name, contact_email)
    VALUES ('$companyName', '$contactName', '$contactEmail')";

    if ($conn->query($insert_sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $insert_sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Add Client to CRM System</title>
<style>
body {font-family: Courier, monospace; color: #333;}
.container {width: 40%; margin: auto; padding: 20px; border: 1px solid #bbb; border-radius: 5px;}
input[type=text], input[type=email] {width: 100%; padding: 10px; margin: 5px 0; border-radius: 5px; border: 1px solid #ccc; }
input[type=submit] {background-color: #4CAF50; color: white; padding: 14px 20px; margin: 10px 0; border: none; border-radius: 5px; cursor: pointer;}
input[type=submit]:hover {background-color: #45a049;}
</style>
</head>
<body>

<div class="container">
<h1>Add a New Client</h1>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
  <label for="companyName">Company Name</label>
  <input type="text" id="companyName" name="companyName" required>
  
  <label for="contactName">Contact Name</label>
  <input type="text" id="contactName" name="contactName">
  
  <label for="contactEmail">Contact Email</label>
  <input type="email" id="contactEmail" name="contactEmail">
  
  <input type="submit" value="Add Client">
</form>
</div>

</body>
</html>

<?php
$conn->close();
?>
