CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
postId INT(6) UNSIGNED,
author VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (postId, author, comment) VALUES (1, 'Alice', 'Great article!');
INSERT INTO comments (postId, author, comment) VALUES (1, 'Bob', 'I enjoyed reading this.');
INSERT INTO comments (postId, author, comment) VALUES (2, 'Charlie', 'Interesting topic.');
INSERT INTO comments (postId, author, comment) VALUES (3, 'David', 'Looking forward to more content.');
INSERT INTO comments (postId, author, comment) VALUES (3, 'Eve', 'Really insightful post.');
INSERT INTO comments (postId, author, comment) VALUES (4, 'Frank', 'Well written.');
INSERT INTO comments (postId, author, comment) VALUES (4, 'Grace', 'Thanks for sharing.');
INSERT INTO comments (postId, author, comment) VALUES (5, 'Hannah', 'Engaging content.');
INSERT INTO comments (postId, author, comment) VALUES (5, 'Isaac', 'Interesting perspective.');
INSERT INTO comments (postId, author, comment) VALUES (6, 'Julia', 'Awesome article!');
