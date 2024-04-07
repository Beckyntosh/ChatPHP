<!DOCTYPE html>
<html>
<head>
<style>
body {
    background-color: black;
	color: white;
	font-family: "Lucida Console", Monaco, monospace;
	background-image:url('https://example.com/stellar-space-background.jpg');
	background-repeat: no-repeat;
	background-size:cover;
}
</style>
</head>
<body>

<h1>Stellar Space Video Games Language Learning Forum </h1>

<?php
    $servername = 'db';
    $username = 'root';
    $password = 'root';
    $dbname = 'my_database';
    
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $comment = $_POST['comment'];
        $sql = "INSERT INTO users (username, comment) VALUES ('$username', '$comment')";
        
        if ($conn->query($sql) !== TRUE) {
            echo "Error while saving comment.";
        }
    }

    $sql = 'SELECT username, comment FROM users';
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<p><strong>" . $row['username']. "</strong>: " . $row['comment']. "</p>";
        }
    }
?>

<form method="post" action="">
  Username: <input type="text" name="username"><br>
  Comment: <input type="text" name="comment"><br>
  <input type="submit">
</form>

</body>
</html>