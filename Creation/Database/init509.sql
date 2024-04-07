CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(6) UNSIGNED NOT NULL,
    author VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, author, comment) VALUES (1, 'John Doe', 'Great article!');
INSERT INTO comments (article_id, author, comment) VALUES (1, 'Jane Smith', 'Interesting insights.');
INSERT INTO comments (article_id, author, comment) VALUES (2, 'Alice Johnson', 'Nice read.');
INSERT INTO comments (article_id, author, comment) VALUES (2, 'Bob Brown', 'I agree with the points made.');
INSERT INTO comments (article_id, author, comment) VALUES (3, 'Eva Lee', 'This article provides valuable information.');
INSERT INTO comments (article_id, author, comment) VALUES (3, 'Mike Taylor', 'Well written.');
INSERT INTO comments (article_id, author, comment) VALUES (4, 'Sarah Adams', 'Thank you for sharing this.');
INSERT INTO comments (article_id, author, comment) VALUES (4, 'Chris Wilson', 'I enjoyed reading this.');
INSERT INTO comments (article_id, author, comment) VALUES (5, 'Emily Clark', 'Insightful content.');
INSERT INTO comments (article_id, author, comment) VALUES (5, 'David White', 'Looking forward to more articles like this.');
