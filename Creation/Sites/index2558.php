<?php
// Connection & session start
session_start();
$servername = "db";
$database = "my_database";
$username = "root";
$password = "root";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create widget table if not exists
$widgetTableSql = "CREATE TABLE IF NOT EXISTS user_widgets (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    widget_type VARCHAR(50) NOT NULL,
    position INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users(id)
)";
$conn->query($widgetTableSql);

// Check if user is logging in for the first time and redirect to customization page
if (isset($_POST['btnLogin']) && !empty($_POST['username'])) {
    $username = trim($_POST['username']);
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $userData = $result->fetch_assoc();
        $_SESSION['user_id'] = $userData['id'];
        if ($userData['is_first_login'] == 1) {
            header("Location: customize-dashboard.php");
            exit();
        }
        // Redirect user to homepage if not first login
        header("Location: dashboard.php");
        exit();
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Children's Clothing Dashboard Customization</title>
<style>
  body { font-family: Arial, sans-serif; }
  .widget { padding: 20px; border: 1px solid #ddd; margin-bottom: 10px; }
</style>
</head>
<body>
<?php if(isset($_SESSION['user_id'])): ?>
  <form action="customize-save.php" method="post">
    <div>
      <label>Select Widgets for Your Dashboard:</label><br/>
      <div class="widget">
        <input type="checkbox" name="widgets[]" value="New Arrivals"> New Arrivals
      </div>
      <div class="widget">
        <input type="checkbox" name="widgets[]" value="Best Sellers"> Best Sellers
      </div>
      <div class="widget">
        <input type="checkbox" name="widgets[]" value="Sales"> Sales
      </div>
      <button type="submit" name="saveWidgets">Save Dashboard</button>
    </div>
  </form>
<?php else: ?>
  <form action="" method="post">
    <div>
      <label for="username">Username:</label><br/>
      <input type="text" id="username" name="username" required><br/>
      <button type="submit" name="btnLogin">Login</button>
    </div>
  </form>
<?php endif; ?>
</body>
</html>

<?php
if (isset($_POST['saveWidgets'])) {
    $userId = $_SESSION['user_id'];
    $widgets = $_POST['widgets'] ?: [];
    $position = 0;
    foreach ($widgets as $widgetType) {
        $position++;
        $insertSql = "INSERT INTO user_widgets (user_id, widget_type, position) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($insertSql);
        $stmt->bind_param("isi", $userId, $widgetType, $position);
        $stmt->execute();
    }
    // Mark user as configured
    $updateUserSql = "UPDATE users SET is_first_login = 0 WHERE id = ?";
    $stmt = $conn->prepare($updateUserSql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();

    header("Location: dashboard.php");
    exit();
}
$conn->close();
?>
