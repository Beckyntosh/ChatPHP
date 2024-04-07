CREATE TABLE IF NOT EXISTS comments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    post_id INT NOT NULL,
    name VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, name, comment) VALUES 
(1, 'Alice', 'Great post!'),
(1, 'Bob', 'Interesting topic.'),
(1, 'Charlie', 'I learned a lot from this.'),
(1, 'David', 'Looking forward to more posts.'),
(1, 'Eve', 'This was helpful.'),
(1, 'Frank', 'Nice insights.'),
(1, 'Grace', 'Well written.'),
(1, 'Henry', 'Thank you for sharing this.'),
(1, 'Isabel', 'Enjoyed reading this.'),
(1, 'Jack', 'Good job on the content.');
