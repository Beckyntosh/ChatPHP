CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
commenter_name VARCHAR(50) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Alice', 'Great post!');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Bob', 'Interesting insights.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Charlie', 'Looking forward to more posts.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'David', 'Thank you for sharing.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Eve', 'I have a question.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Fiona', 'Enjoyed reading this.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'George', 'Keep up the good work.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Hannah', 'Inspiring content.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Ian', 'Can\'t wait for the next post.');
INSERT INTO comments (post_id, commenter_name, comment) VALUES (1, 'Jane', 'Interesting perspective.');
