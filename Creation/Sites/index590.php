<?php
  $host = 'db';
  $user = 'root';
  $password = 'root';
  $dbname = 'my_database';
  
  $conn = new mysqli($host, $user, $password, $dbname);
  
  if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
  }

  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $fileName = $_FILES['podcast']['name'];
    $tempName = $_FILES['podcast']['tmp_name'];

    if(isset($fileName)){
        if(!empty($fileName)){
            $location = "uploads/";
            if(move_uploaded_file($tempName, $location.$fileName)) {
                $sql = "INSERT INTO products (ProductName) VALUES ('".$fileName."')";
                if($conn->query($sql) === true){
                    echo "File uploaded successfully";
                }else{
                    echo "Failed to upload file.";
                }
            }
        }
    }  
  }  
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="mediterranean.css">
</head>
<body>
  <form method='post' action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' enctype='multipart/form-data'>
    <input type='file' name='podcast' />
    <input type='submit' value='UPLOAD' name='upload'/>
  </form>
</body>
</html>