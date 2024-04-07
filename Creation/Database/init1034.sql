CREATE TABLE IF NOT EXISTS comments (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    post_id INT(6) UNSIGNED,
    author VARCHAR(50) NOT NULL,
    comment TEXT NOT NULL,
    posted_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, author, comment) VALUES (1, 'John Doe', 'Great article!');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Jane Smith', 'Interesting points.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Michael Johnson', 'Looking forward to more content.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Emily Brown', 'Fantastic read.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'David Wilson', 'Well written!');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Jessica Lee', 'Enjoyed the insights.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Kevin Davis', 'Informative post.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Sophia Garcia', 'Thanks for sharing.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Robert Martinez', 'Engaging content.');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Olivia Thompson', 'Impressive work.');
