CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
username VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, username, comment) VALUES (1, 'John Doe', 'Great article!');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Alice Smith', 'Interesting read.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Bob Brown', 'I have a question.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Emma Johnson', 'Thanks for sharing.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Mike Wilson', 'Good job!');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Sarah Clark', 'Well written.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'David Lee', 'Looking forward to more.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Karen Adams', 'Insightful.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Ryan White', 'I agree with the points.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Laura Taylor', 'Impressive work.');