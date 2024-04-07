CREATE TABLE IF NOT EXISTS blog_posts (
id INT AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255),
content TEXT,
author VARCHAR(50),
posted_date DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO blog_posts (title, content, author) VALUES ('First Post', 'This is the content of the first post', 'John Doe');
INSERT INTO blog_posts (title, content, author) VALUES ('Second Post', 'This is the content of the second post', 'Jane Smith');
INSERT INTO blog_posts (title, content, author) VALUES ('Third Post', 'This is the content of the third post', 'Alice Johnson');
INSERT INTO blog_posts (title, content, author) VALUES ('Fourth Post', 'This is the content of the fourth post', 'Bob Brown');
INSERT INTO blog_posts (title, content, author) VALUES ('Fifth Post', 'This is the content of the fifth post', 'Eve White');
INSERT INTO blog_posts (title, content, author) VALUES ('Sixth Post', 'This is the content of the sixth post', 'Michael Grey');
INSERT INTO blog_posts (title, content, author) VALUES ('Seventh Post', 'This is the content of the seventh post', 'Sarah Green');
INSERT INTO blog_posts (title, content, author) VALUES ('Eighth Post', 'This is the content of the eighth post', 'David Wilson');
INSERT INTO blog_posts (title, content, author) VALUES ('Ninth Post', 'This is the content of the ninth post', 'Laura Taylor');
INSERT INTO blog_posts (title, content, author) VALUES ('Tenth Post', 'This is the content of the tenth post', 'Chris Young');
