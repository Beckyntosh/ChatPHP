// PARAMETERS: Function: Customizable User Dashboard Creation on First Login: create an example feature for customizing the dashboard on first login. Example: User customizes their dashboard layout and widgets after first login Product: Musical Instruments Style: asynchronous
<?php
// Set error reporting for development
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection parameters
define('DB_SERVER', 'db');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'my_database');

// Attempt to connect to MySQL database
try {
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";dbname=" . DB_NAME, DB_USERNAME, DB_PASSWORD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

// Check if it's the user's first login
function isFirstLogin($userId)
{
    global $pdo;
    $sql = "SELECT first_login FROM users WHERE id = :userId";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);

        if ($stmt->execute()) {
            if ($row = $stmt->fetch()) {
                return $row['first_login'] ? true : false;
            }
        }
    }
    return false;
}

// Update user's first_login status
function updateUserFirstLogin($userId)
{
    global $pdo;
    $sql = "UPDATE users SET first_login = 0 WHERE id = :userId";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
    }
}

// Handles layout customization based on user input
function customizeDashboardLayout($userId, $layout)
{
    global $pdo;
    $sql = "INSERT INTO user_dashboard (user_id, layout) VALUES (:userId, :layout) ON DUPLICATE KEY UPDATE layout = :layout";

    if ($stmt = $pdo->prepare($sql)) {
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':layout', $layout, PDO::PARAM_STR);

        $stmt->execute();
    }
}

$userId = 1; // Assume user ID 1 for this example

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customize Dashboard</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <style>
        .dashboard-layout {
            display: flex;
            justify-content: space-around;
        }
        .widget {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 5px;
        }
    </style>
</head>
<body>

<?php if (isFirstLogin($userId)): ?>
    <h2>Customize Your Dashboard</h2>
    <div id="customizeDashboard">
        <button data-layout="classic">Classic Layout</button>
        <button data-layout="modern">Modern Layout</button>
    </div>
    <script>
        $(document).ready(function() {
            $('#customizeDashboard button').on('click', function() {
                var layout = $(this).data('layout');

                $.ajax({
                    url: window.location.href,
                    type: 'POST',
                    data: {
                        userId: <?= $userId ?>,
                        layout: layout
                    },
                    success: function(response) {
                        // Assuming the server updates the layout and the users' first login status
                        alert('Dashboard layout updated. Refresh the page!');
                        location.reload();
                    }
                });
            });
        });
    </script>
<?php else: ?>
    <?php
    // Display custom dashboard layout
    echo "<h2>Your Dashboard</h2>";
    echo "<div class='dashboard-layout'>";
    // Example widgets
    echo "<div class='widget'>New Arrivals in Instruments</div>";
    echo "<div class='widget'>Today's Deals</div>";
    // Assuming the user selected layout is fetched and displayed
    echo "</div>";
    ?>
<?php endif; ?>

</body>
</html>

<?php
// Handle POST request for layout customization
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['layout'], $_POST['userId'])) {
    $layout = $_POST['layout'];
    $userId = $_POST['userId'];
    
    // Customizing dashboard layout
    customizeDashboardLayout($userId, $layout);
    
    // Updating user's first login status
    updateUserFirstLogin($userId);
    
    exit; // Important to prevent further rendering or logic execution
}
?>
