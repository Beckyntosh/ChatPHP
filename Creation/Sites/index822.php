<?php
/* Database Connection */
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

/* Check if the poll table exists, if not create */
$createPollTable = "CREATE TABLE IF NOT EXISTS poll (
  id INT AUTO_INCREMENT PRIMARY KEY,
  question VARCHAR(255),
  option_one VARCHAR(255),
  option_two VARCHAR(255),
  option_three VARCHAR(255), 
  option_one_votes INT DEFAULT 0,
  option_two_votes INT DEFAULT 0,
  option_three_votes INT DEFAULT 0
)";

if (!$conn->query($createPollTable)) {
  echo "Error creating table: " . $conn->error;
}

/* Insert a default poll if it doesn't exist */
$checkPollExists = "SELECT COUNT(*) AS count FROM poll";
$result = $conn->query($checkPollExists);
$row = $result->fetch_assoc();

if($row['count'] == 0) {
  $insertPoll = "INSERT INTO poll (question, option_one, option_two, option_three) VALUES ('Which watch brand do you prefer?', 'Rolex', 'Omega', 'Tag Heuer')";
  if(!$conn->query($insertPoll)) {
    echo "Error inserting poll: " . $conn->error;
  }
}

/* Handle Vote */
if($_SERVER["REQUEST_METHOD"] == "POST") {
  $vote = $_POST["vote"];
  
  $updateVote = "UPDATE poll SET ${vote} = ${vote} + 1 WHERE id = 1";
  
  if(!$conn->query($updateVote)) {
    echo "Error updating record: " . $conn->error;
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quaint Quarters - Watch Poll</title>
    <style>
        body {
            font-family: "Times New Roman", Times, serif;
            background-color: #fdf1e0;
            color: #333;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Welcome to Quaint Quarters Watches Blog</h1>
    <h2>Vote for your favorite Watch Brand!</h2>
    <form action="" method="post">
        <?php
        $getPollQuery = "SELECT * FROM poll WHERE id = 1";
        $poll = $conn->query($getPollQuery)->fetch_assoc();
        ?>
        <p><?php echo htmlentities($poll['question']); ?></p>
        <input type="radio" id="option_one" name="vote" value="option_one_votes">
        <label for="option_one"><?php echo htmlentities($poll['option_one']); ?></label><br>
        <input type="radio" id="option_two" name="vote" value="option_two_votes">
        <label for="option_two"><?php echo htmlentities($poll['option_two']); ?></label><br>
        <input type="radio" id="option_three" name="vote" value="option_three_votes">
        <label for="option_three"><?php echo htmlentities($poll['option_three']); ?></label><br>
        <button type="submit">Vote</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>