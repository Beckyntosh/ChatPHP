CREATE TABLE IF NOT EXISTS comments (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    article_id INT(11) NOT NULL,
    author VARCHAR(255) NOT NULL,
    comment TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO comments (article_id, author, comment) VALUES (1, 'John Doe', 'This is a great article about electronics');
INSERT INTO comments (article_id, author, comment) VALUES (1, 'Alice Smith', 'I disagree with some points in the article');
INSERT INTO comments (article_id, author, comment) VALUES (1, 'Bob Johnson', 'I found the content very informative');
INSERT INTO comments (article_id, author, comment) VALUES (2, 'Eve Brown', 'Nice insights shared in this article');
INSERT INTO comments (article_id, author, comment) VALUES (2, 'Charlie Wilson', 'Looking forward to more articles like this');
INSERT INTO comments (article_id, author, comment) VALUES (3, 'Grace Lee', 'This news story is really eye-opening');
INSERT INTO comments (article_id, author, comment) VALUES (3, 'David Jones', 'I appreciate the thorough coverage in this article');
INSERT INTO comments (article_id, author, comment) VALUES (4, 'Sophia Miller', 'Great job by the author in presenting the facts');
INSERT INTO comments (article_id, author, comment) VALUES (4, 'Oliver White', 'I have some reservations about the viewpoints expressed');
INSERT INTO comments (article_id, author, comment) VALUES (5, 'Emma Harris', 'Interesting read, looking forward to more discussions');
