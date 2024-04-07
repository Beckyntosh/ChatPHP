<?php
$rootPassword = 'root';
$databaseName = 'my_database';
$serverName = 'db';

// Create connection
$conn = new mysqli($serverName, 'root', $rootPassword, $databaseName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['jsonfile'])) {
        $errors = [];
        $file_name = $_FILES['jsonfile']['name'];
        $file_size =$_FILES['jsonfile']['size'];
        $file_tmp =$_FILES['jsonfile']['tmp_name'];
        $file_type=$_FILES['jsonfile']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['jsonfile']['name'])));

        if(empty($errors)==true) {
            if ($file_json = file_get_contents($file_tmp)) {
                if($data = json_decode($file_json, true)) {
                    if (isset($data['users']) && isset($data['products'])) {
                        foreach($data['users'] as $user) {
                            $sql = "INSERT INTO users (name, email) VALUES ('".$user['name']."', '".$user['email']."')";
                            if (!$conn->query($sql)) {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }

                        foreach($data['products'] as $product) {
                            $sql = "INSERT INTO products (title, price) VALUES ('".$product['title']."', '".$product['price']."')";
                            if (!$conn->query($sql)) {
                                echo "Error: " . $sql . "<br>" . $conn->error;
                            }
                        }
                        echo "Data imported successfully";
                    }
                }
            }
        }else{
            print_r($errors);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>JSON File Upload</title>
    <style>
        body {
            font-family: 'Courier New', Courier, monospace;
            background-color: #F5F5F5;
        }
    </style>
</head>
<body>
    <form action="" method="POST" enctype="multipart/form-data">
        <input type="file" name="jsonfile" />
        <input type="submit"/>
    </form>
</body>
</html>