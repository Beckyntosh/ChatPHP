CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
comment TEXT,
comment_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 1');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 2');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 3');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 4');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 5');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 6');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 7');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 8');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 9');
INSERT INTO comments (post_id, comment) VALUES (1, 'This is a sample comment 10');