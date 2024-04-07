<?php
* First, connect to the database */
$servername = "db";
$username = "root";
$password = 'root';
$database = "my_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

* Check if the form is submitted */
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $email = $_POST['email'];

  // Prepare the SQL statement to prevent SQL injection
  $stmt = $conn->prepare("INSERT INTO product_updates (email) VALUES (?)");
  $stmt->bind_param("s", $email);

  // Execute the statement and check if it was successful
  if ($stmt->execute()) {
    echo "<p>Success! You are now signed up for product updates.</p>";
  } else {
    echo "<p>Error: " . $sql . "<br>" . $conn->error . "</p>";
  }

  $stmt->close();
}

// close connection
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up for Product Updates</title>
<style>
  body { font-family: Arial, sans-serif; margin: 0; padding: 20px; background-color: #f3f4f6; color: #333;}
  .container { margin-top: 50px; background-color: #fff; padding: 20px; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0,0,0,0.1); }
  form { display: flex; flex-direction: column; gap: 10px; }
  input[type=email], button { padding: 10px; font-size: 16px; border-radius: 5px; border: 1px solid #ccc; }
  button { background-color: #007bff; color: #fff; cursor: pointer; }
</style>
</head>
<body>

<div class="container">
  <h2>Sign Up for Product Updates</h2>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Sign Up</button>
  </form>
</div>

</body>
</html>

Note: The code handles the Signup form and inserts users' email addresses into a 'product_updates' table, which you would need to create in your 'my_database'. Here's a simple SQL to create such a table if it doesn't exist:

CREATE TABLE product_updates (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  email VARCHAR(50) NOT NULL,
  signup_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)
