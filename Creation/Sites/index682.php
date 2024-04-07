<?php
// Connecting to database
$servername = "db";
$username = "root";
$password = "root";
$dbname = "my_database";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create tables if not exists
$initQueries = [
    "CREATE TABLE IF NOT EXISTS products (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255),
        description TEXT,
        category VARCHAR(100),
        price DECIMAL(10, 2),
        stock_quantity INT
    );",
    "INSERT INTO products (name, description, category, price, stock_quantity) VALUES
    ('Product A', 'Description of Product A', 'Category1', 19.99, 100),
    ('Product B', 'Description of Product B', 'Category2', 29.99, 80),
    ('Product C', 'Description of Product C', 'Category1', 39.99, 150),
    ('Product D', 'Description of Product D', 'Category3', 49.99, 200),
    ('Product E', 'Description of Product E', 'Category2', 59.99, 60),
    ('Product F', 'Description of Product F', 'Category3', 69.99, 90);",
    "CREATE TABLE IF NOT EXISTS users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(30),
        name VARCHAR(30),
        email VARCHAR(50),
        password VARCHAR(255)
    );",
    "INSERT INTO users (username, name, email, password) VALUES
    ('user1', 'User One', 'user1@example.com', 'password1'),
    ('user2', 'User Two', 'user2@example.com', 'password2'),
    ('user3', 'User Three', 'user3@example.com', 'password3');",
    "CREATE TABLE IF NOT EXISTS chat_sessions (
        id INT AUTO_INCREMENT PRIMARY KEY,
        user_id INT,
        agent_name VARCHAR(100),
        session_start TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        session_end TIMESTAMP NULL
    );",
    "CREATE TABLE IF NOT EXISTS chat_messages (
        id INT AUTO_INCREMENT PRIMARY KEY,
        chat_session_id INT,
        sender VARCHAR(30),
        message TEXT,
        time_sent TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    );"
];

foreach ($initQueries as $query) {
    if (!$conn->query($query)) {
        echo "Error creating table: " . $conn->error;
    }
}

// Chat Form Handler
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userId = 1; // Sample User ID
    $agentName = "Agent Jane Doe"; // Sample Agent Name
    $message = $_POST['message'] ?? '';

    $chatSessionIdQuery = "SELECT id FROM chat_sessions WHERE user_id = $userId AND session_end IS NULL LIMIT 1";
    $result = $conn->query($chatSessionIdQuery);

    if ($result->num_rows == 0) {
        // Creating a new chat session
        $insertSessionSql = "INSERT INTO chat_sessions (user_id, agent_name) VALUES ($userId, '$agentName')";
        if ($conn->query($insertSessionSql)) {
            $chatSessionId = $conn->insert_id;
        } else {
            echo "Error: " . $insertSessionSql . "<br>" . $conn->error;
        }
    } else {
        $row = $result->fetch_assoc();
        $chatSessionId = $row['id'];
    }

    // Insert message
    $insertMessageSql = "INSERT INTO chat_messages (chat_session_id, sender, message) VALUES ($chatSessionId, 'User', '$message')";
    if (!$conn->query($insertMessageSql)) {
        echo "Error: " . $insertMessageSql . "<br>" . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Live Chat Support</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9f7ef; /* Lush Landscape Background */
            color: #216583; /* Deep Landscape Color */
        }
        .chat-box {
            background-color: #f0f4f8;
            border-radius: 8px;
            padding: 20px;
            width: 300px;
            margin: 20px auto;
        }
        .chat-input {
            width: calc(100% - 22px);
            padding: 10px;
            margin-top: 10px;
            border-radius: 5px;
            border: 1px solid #cccccc;
        }
        .chat-submit {
            width: 100%;
            padding: 10px 20px;
            margin-top: 10px;
            background-color: #4caf50; /* Lush Landscape Button */
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="chat-box">
        <h2>Live Chat Support</h2>
        <form method="POST" action="">
            <textarea name="message" class="chat-input" placeholder="Type your message here..."></textarea>
            <button type="submit" class="chat-submit">Send</button>
        </form>
    </div>
</body>
</html>

<?php
$conn->close();
?>