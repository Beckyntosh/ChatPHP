CREATE TABLE IF NOT EXISTS Posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(100),
content TEXT,
author VARCHAR(50),
date_posted TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO Posts(title, content, author) VALUES('Post 1', 'Content for Post 1', 'Author 1');
INSERT INTO Posts(title, content, author) VALUES('Post 2', 'Content for Post 2', 'Author 2');
INSERT INTO Posts(title, content, author) VALUES('Post 3', 'Content for Post 3', 'Author 3');
INSERT INTO Posts(title, content, author) VALUES('Post 4', 'Content for Post 4', 'Author 4');
INSERT INTO Posts(title, content, author) VALUES('Post 5', 'Content for Post 5', 'Author 5');
INSERT INTO Posts(title, content, author) VALUES('Post 6', 'Content for Post 6', 'Author 6');
INSERT INTO Posts(title, content, author) VALUES('Post 7', 'Content for Post 7', 'Author 7');
INSERT INTO Posts(title, content, author) VALUES('Post 8', 'Content for Post 8', 'Author 8');
INSERT INTO Posts(title, content, author) VALUES('Post 9', 'Content for Post 9', 'Author 9');
INSERT INTO Posts(title, content, author) VALUES('Post 10', 'Content for Post 10', 'Author 10');