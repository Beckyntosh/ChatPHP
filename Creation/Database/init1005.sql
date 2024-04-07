CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
username VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, username, comment) VALUES (1, 'Alice', 'Great article! Thanks for sharing.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Bob', 'I have a different perspective on this topic.');
INSERT INTO comments (article_id, username, comment) VALUES (1, 'Charlie', 'Interesting read, looking forward to more.');
INSERT INTO comments (article_id, username, comment) VALUES (2, 'David', 'This news is very important for the industry.');
INSERT INTO comments (article_id, username, comment) VALUES (2, 'Eve', 'I disagree with some points mentioned in the article.');
INSERT INTO comments (article_id, username, comment) VALUES (2, 'Fiona', 'I appreciate the detailed analysis in this article.');
INSERT INTO comments (article_id, username, comment) VALUES (3, 'George', 'I have a question regarding a point in the article.');
INSERT INTO comments (article_id, username, comment) VALUES (3, 'Hannah', 'The article presented a fresh perspective on the topic.');
INSERT INTO comments (article_id, username, comment) VALUES (3, 'Ian', 'Great job on covering this news story.');
INSERT INTO comments (article_id, username, comment) VALUES (3, 'Jane', 'I enjoyed reading the article.');
