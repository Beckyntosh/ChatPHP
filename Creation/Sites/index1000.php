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

// Create tables if they do not exist
$createTables = "
CREATE TABLE IF NOT EXISTS Gadgets (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(50) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
gadget_id INT(6) UNSIGNED,
author VARCHAR(50),
rating INT(1),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (gadget_id) REFERENCES Gadgets(id)
);
";

if ($conn->multi_query($createTables) === TRUE) {
  // Wait for multi queries to finish.
  do {
       /* store first result set */
       if ($result = $conn->store_result()) {
          while ($row = $result->fetch_row()) {
             // No need to display results for table creation
          }
          $result->free();
       }
   } while ($conn->next_result());
} else {
  echo "Error creating tables: " . $conn->error;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gadget Review Portal</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .container { width: 80%; margin: 20px auto; }
        .review, .gadget { background-color: #f4f4f4; padding: 10px; margin-bottom: 20px; }
        form { margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Gadget Review Portal</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty($_POST['name']) && !empty($_POST['description'])) {
                $stmt = $conn->prepare("INSERT INTO Gadgets (name, description) VALUES (?, ?)");
                $stmt->bind_param("ss", $_POST['name'], $_POST['description']);
                $stmt->execute();
                echo "<p>Gadget added successfully!</p>";
            }
        }

        $result = $conn->query("SELECT id, name, description FROM Gadgets");
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='gadget'><h2>" . $row["name"]. "</h2><p>" . $row["description"]. "</p></div>";
            }
        } else {
            echo "<p>No gadgets found</p>";
        }
        ?>

        <form action="" method="post">
            <input type="text" name="name" placeholder="Gadget Name" required>
            <input type="text" name="description" placeholder="Gadget Description" required>
            <button type="submit">Add Gadget</button>
        </form>
    </div>
</body>
</html>
<?php
$conn->close();
?>
