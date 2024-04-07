CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    comment TEXT NOT NULL,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (comment) VALUES ('Great post!');
INSERT INTO comments (comment) VALUES ('Interesting research topic.');
INSERT INTO comments (comment) VALUES ('Looking forward to reading more.');
INSERT INTO comments (comment) VALUES ('Nice design of the comment section.');
INSERT INTO comments (comment) VALUES ('Keep up the good work.');
INSERT INTO comments (comment) VALUES ('Impressive functionality.');
INSERT INTO comments (comment) VALUES ('Excited to see the results.');
INSERT INTO comments (comment) VALUES ('Informative content.');
INSERT INTO comments (comment) VALUES ('User-friendly interface.');
INSERT INTO comments (comment) VALUES ('Engaging discussion.');

