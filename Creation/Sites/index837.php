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

if($_POST){
  $username = $_POST['username'];
  $secret_question = $_POST['secret_question'];
  $secret_answer = $_POST['secret_answer'];

  $sql = "UPDATE users SET secret_question='".$secret_question."', secret_answer='".md5($secret_answer)."' WHERE username='".$username."'";

  if ($conn->query($sql) === TRUE) {
    echo "Security question updated successfully";
  } else {
    echo "Error updating security question: " . $conn->error;
  }
}

$conn->close();
?>

<!DOCTYPE html>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<html>
<body>

  <div class="container">
    <h2 align="center">Bath Products Online Appointment Booking Site</h2>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
      <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
      </div>
      <div class="form-group">
          <label for="secret_question">Secret Question:</label>
          <input type="text" class="form-control" id="secret_question" name="secret_question">
      </div>
      <div class="form-group">
          <label for="secret_answer">Secret Answer:</label>
          <input type="password" class="form-control" id="secret_answer" name="secret_answer">
      </div>
      <button type="submit" class="btn btn-default">Submit</button>
    </form>
  </div>

</body>
</html>