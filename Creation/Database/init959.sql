CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) NOT NULL,
    author VARCHAR(30) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, author, comment) VALUES (1, 'John Doe', 'Great post!');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Alice Smith', 'I have a question.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Max Johnson', 'Interesting read.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Emily Brown', 'Thanks for sharing.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Sam Wilson', 'Looking forward to more posts.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Sophie Lee', 'This was helpful.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Mark Roberts', 'I enjoyed reading this.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Olivia Taylor', 'Well written.');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Ryan Clark', 'Can you elaborate on this point?');

INSERT INTO comments (post_id, author, comment) VALUES (1, 'Sarah Phillips', 'I have a similar experience.');