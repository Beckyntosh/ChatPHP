CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) UNSIGNED NOT NULL,
    author VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Insert sample data into comments table
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Alice', 'Great article!');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Bob', 'Interesting insights.');
INSERT INTO comments (post_id, author, comment) VALUES (2, 'Charlie', 'Thanks for sharing this.');
INSERT INTO comments (post_id, author, comment) VALUES (2, 'David', 'I had a similar experience.');
INSERT INTO comments (post_id, author, comment) VALUES (3, 'Eve', 'Looking forward to more content.');
INSERT INTO comments (post_id, author, comment) VALUES (4, 'Frank', 'Well written and informative.');
INSERT INTO comments (post_id, author, comment) VALUES (4, 'Grace', 'Enjoyed reading this.');
INSERT INTO comments (post_id, author, comment) VALUES (5, 'Henry', 'This topic is crucial.');
INSERT INTO comments (post_id, author, comment) VALUES (6, 'Isabel', 'Impressive analysis.');
INSERT INTO comments (post_id, author, comment) VALUES (6, 'Jack', 'Keep up the good work.');
