CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
article_id INT(6) UNSIGNED NOT NULL,
user VARCHAR(30) NOT NULL,
comment TEXT NOT NULL,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, user, comment) VALUES (1, 'John Doe', 'Great article!');
INSERT INTO comments (article_id, user, comment) VALUES (1, 'Jane Smith', 'Interesting read.');
INSERT INTO comments (article_id, user, comment) VALUES (2, 'Alice Brown', 'I disagree with this point.');
INSERT INTO comments (article_id, user, comment) VALUES (2, 'Bob Johnson', 'Looking forward to more articles.');
INSERT INTO comments (article_id, user, comment) VALUES (3, 'Emily Davis', 'This topic needs more discussion.');
INSERT INTO comments (article_id, user, comment) VALUES (3, 'Robert Wilson', 'I have a different perspective on this issue.');
INSERT INTO comments (article_id, user, comment) VALUES (4, 'Sarah White', 'This article resonates with me.');
INSERT INTO comments (article_id, user, comment) VALUES (4, 'James Lee', 'Well-written piece.');
INSERT INTO comments (article_id, user, comment) VALUES (5, 'Grace Martinez', 'I found this article enlightening.');
INSERT INTO comments (article_id, user, comment) VALUES (5, 'Michael Clark', 'The author raises important points.');
