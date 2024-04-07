<?php
  $host = "db";
  $username = "root";
  $password = "root";
  $database = "my_database";

  $connection = mysqli_connect($host, $username, $password);

  if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
  }

  // Select database
  $db_select = mysqli_select_db($connection, $database);

  if (!$db_select) {
    die("Database selection failed: " . mysqli_connect_error());
  }
?>

<!DOCTYPE html>
<html>
<head>
  <title>Skin Care Products VR Experience Showcase: User Search</title>
  <style>
     body {
       font-family: "Cottage", serif;
       background-color: #f8efd4;
       color: #57534e;
     }

     div {
       width: 60%;
       margin: 5% auto;
       background-color: #dcd2be;
       padding: 20px;
       border: 1px solid #bbb0a1;
     }
   </style>
</head>
<body>
  <div>
    <h2>User Search</h2>

    <form method="get" action="search-user.php">
      <input type="text" name="search" placeholder="Search users here..." required>
      <input type="submit" value="Search">
    </form>

    <?php
      if (isset($_GET['search'])) {
        $search = mysqli_real_escape_string($connection, $_GET['search']);
        $query = "SELECT * FROM users WHERE username LIKE '%$search%'";

        $result = mysqli_query($connection, $query);

        if (!$result) {
          die("Query failed: " . mysqli_connect_error());
        }

        while ($row = mysqli_fetch_assoc($result)) {
          echo "<p>Username: " . $row['username'] . "</p>";
          echo "<hr>";
        }
      }

    mysqli_close($connection);
    ?>
  </div>
</body>
</html>