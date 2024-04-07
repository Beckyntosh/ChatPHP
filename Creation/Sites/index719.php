<?php
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Create database connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check database connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id']; // User ID as query parameter

$sql = "SELECT * FROM users WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Fetch user data
  $user = $result->fetch_assoc();

  // Fetch user achievements
  $sql = "SELECT * FROM achievements WHERE user_id=$id";
  $result = $conn->query($sql);
  $achievements = $result->fetch_all(MYSQLI_ASSOC);

  // Fetch badges
  $sql = "SELECT * FROM badges WHERE user_id=$id";
  $result = $conn->query($sql);
  $badges = $result->fetch_all(MYSQLI_ASSOC);

  $conn->close();

  ?>

  <!DOCTYPE html>
  <html>

  <head>
    <title>Books Travel and Tourism Site</title>
    <style>
      /* No actual styles provided for the 'Vintage Vogue' theme, implement as required */
      body {
        font-family: Arial, sans-serif;
      }
    </style>
  </head>

  <body>
    <h1>Welcome <?= $user['name'] ?></h1>
    <h2>Your Achievements</h2>
    <ul>
      <?php foreach ($achievements as $achievement) { ?>
        <li><?= $achievement['name'] ?></li>
      <?php } ?>
    </ul>

    <h2>Your Badges</h2>
    <ul>
      <?php foreach ($badges as $badge) { ?>
        <li><?= $badge['name'] ?></li>
      <?php } ?>
    </ul>
  </body>
  </html>

  <?php

} else {
  echo "User not found";
  $conn->close();
}
?>