CREATE TABLE IF NOT EXISTS comments (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
post_id INT(6) UNSIGNED,
author VARCHAR(50),
comment TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (post_id, author, comment) VALUES (1, 'John Doe', 'This is a great post');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Jane Smith', 'I agree with the points mentioned');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Alice Johnson', 'Interesting read!');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Bob Brown', 'I found this very informative');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Emily Davis', 'Thank you for sharing this');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Michael Wilson', 'I have a question regarding this');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Sarah Thompson', 'Looking forward to more posts like this');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Chris Miller', 'Well written and thought-provoking');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Laura Martinez', 'I enjoyed reading this');
INSERT INTO comments (post_id, author, comment) VALUES (1, 'Alex Rodriguez', 'Great content, keep it up');
