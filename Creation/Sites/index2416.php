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

// Create table if it does not exist
$table = "CREATE TABLE IF NOT EXISTS users (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(30) NOT NULL,
email VARCHAR(50),
trial_start DATE,
trial_end DATE,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($table) === TRUE) {
  //echo "Table users created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $fullname = $_POST['fullname'];
  $email = $_POST['email'];
  $trial_start = date("Y-m-d");
  $trial_end = date("Y-m-d", strtotime($trial_start. ' + 30 days'));

  $sql = "INSERT INTO users (fullname, email, trial_start, trial_end) VALUES ('$fullname', '$email', '$trial_start', '$trial_end')";

  if ($conn->query($sql) === TRUE) {
    echo "<div style='color: green;'>New record created successfully. Enjoy your free trial until $trial_end!</div>";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign Up for a 1-Month Free Trial</title>
    <style>
        body{ font: 14px sans-serif; background-color: #f2f2f2; text-align: center; }
        .wrapper{ width: 350px; padding: 20px; display: inline-block; background-color: #ffffff; border-radius: 10px; }
        .form-group{ margin-bottom: 15px; }
        input[type=text], input[type=email] { width: 100%; padding: 15px; margin: 5px 0 22px 0; display: inline-block; border: none; background: #f1f1f1; }
        input[type=text]:focus, input[type=email]:focus { background-color: #ddd; outline: none; }
        .btn { background-color: #4CAF50; color: white; padding: 14px 20px; margin: 8px 0; border: none; cursor: pointer; width: 100%; opacity: 0.9; }
        .btn:hover { opacity:1; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Sign Up for a Free 1-Month Trial</h2>
        <p>Please fill this form to create an account and start your trial.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="fullname" required>
            </div>    
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <input type="submit" class="btn" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>
