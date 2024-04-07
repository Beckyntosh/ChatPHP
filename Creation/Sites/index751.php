<?php

// Database configuration
$host = 'db';
$username = 'root';
$password = 'root';
$dbname = 'my_database';

// Create DB connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize database
function initDB($conn) {
    $sql = file_get_contents('init.sql');
    if ($conn->multi_query($sql)) {
        echo "Database initialized successfully<br>";
        do {
            if ($res = $conn->store_result()) {
                $res->free();
            }
        } while ($conn->more_results() && $conn->next_result());
    } else {
        echo "Error initializing database: " . $conn->error;
    }
}

// Call initialization function
initDB($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Videos Chat</title>
    <style>
        body {
            background-color: #f4e8c1;
            font-family: "Times New Roman", Times, serif;
            color: #5f4b32;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            background-color: #fff5e1;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0,0,0,0.5);
        }
        header {
            background-color: #8a7f70;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .chatbox {
            width: 100%;
            height: 300px;
            border: 1px solid #5f4b32;
            overflow: auto;
            padding: 15px;
            margin-bottom: 20px;
            background-color: #e3d7bf;
        }
        .user-msg {
            color: #335c67;
            font-style: italic;
        }
        .bot-msg {
            color: #3f6634;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div class="container">
    <header>Royal Regalia Book Video Chat</header>

    <div class="chatbox" id="chatbox">
Chat messages will be dynamically inserted here
    </div>

    <input type="text" id="userInput" placeholder="Type your message here..." style="width: 80%;">
    <button onclick="sendMessage()">Send</button>
</div>

<script>
    function sendMessage() {
        const input = document.getElementById('userInput');
        const chatbox = document.getElementById('chatbox');
        if (input.value.trim() === '') return;

        // Display user message
        const userMsg = document.createElement('p');
        userMsg.classList.add('user-msg');
        userMsg.textContent = 'You: ' + input.value;
        chatbox.appendChild(userMsg);

        // Simulate bot response
        const botMsg = document.createElement('p');
        botMsg.classList.add('bot-msg');
        botMsg.textContent = 'Bot: Processing "' + input.value + '"';
        chatbox.appendChild(botMsg);

        chatbox.scrollTop = chatbox.scrollHeight; // Auto scroll to the bottom
        input.value = ''; // Clear input field
    }
</script>

</body>
</html>