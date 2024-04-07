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

if(isset($_POST["search"])){
  $query = "SELECT * FROM products WHERE destination LIKE ?;";
  $stmt = $conn->stmt_init();
  if(!$stmt->prepare($query)) {
    echo "SQL Statement Failed";
  } else {
    $search = "%".$_POST['search']."%";
    $stmt->bind_param("s", $search);
    $stmt->execute();
    $result = $stmt->get_result();
  }
}

?>

<html>
<head>
<title>Video Games Social Network - Search Travel Destinations</title>
<style>
body {
  background-color: #F5F5DC;
  font-family: 'Courier New', Courier, monospace;
  color: #8B4513;
}
h1 {
  text-align: center;
  text-decoration: underline;
}
.container {
  max-width: 600px;
  margin: 0 auto;
}
form {
  text-align: center;
}
.search-input {
  margin: 20px 0;
  padding: 5px;
  width: 100%;
}
</style>
</head>
<body>
  <div class="container">
    <h1>Search Travel Destinations</h1>
    <form action="./index.php" method="post">
      <input class="search-input" name="search" type="text" placeholder="Search..."/>
      <input type="submit" value="Search"/>
    </form>
    <?php
      if(isset($_POST["search"])) {
        while($row = $result->fetch_assoc()){
          echo "<p><b>".$row['destination']."</b><br>".$row['description']."</p>";
        }
      }
    ?>
  </div>
</body>
</html>

<?php $conn->close(); ?>