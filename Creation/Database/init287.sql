CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
comment TEXT,
comment_time TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, comment) VALUES (1, 'Great post!');

INSERT INTO comments (post_id, comment) VALUES (1, 'Interesting topic.');

INSERT INTO comments (post_id, comment) VALUES (1, 'I learned a lot.');

INSERT INTO comments (post_id, comment) VALUES (1, 'Looking forward to more.');

INSERT INTO comments (post_id, comment) VALUES (1, 'Thanks for sharing.');

INSERT INTO comments (post_id, comment) VALUES (1, 'This comment section is cool.');

INSERT INTO comments (post_id, comment) VALUES (1, 'Amazing read!');

INSERT INTO comments (post_id, comment) VALUES (1, 'Inspiring content.');

INSERT INTO comments (post_id, comment) VALUES (1, 'Keep up the good work.');

INSERT INTO comments (post_id, comment) VALUES (1, 'I have a question.');

