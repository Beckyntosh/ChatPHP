CREATE TABLE IF NOT EXISTS blog_posts (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
title VARCHAR(255) NOT NULL,
content TEXT NOT NULL,
FULLTEXT (title, content)
);

INSERT INTO blog_posts (title, content) VALUES ('First Post', 'This is the content of the first post');
INSERT INTO blog_posts (title, content) VALUES ('Second Post', 'This is the content of the second post');
INSERT INTO blog_posts (title, content) VALUES ('Third Post', 'This is the content of the third post');
INSERT INTO blog_posts (title, content) VALUES ('Fourth Post', 'This is the content of the fourth post');
INSERT INTO blog_posts (title, content) VALUES ('Fifth Post', 'This is the content of the fifth post');
INSERT INTO blog_posts (title, content) VALUES ('Sixth Post', 'This is the content of the sixth post');
INSERT INTO blog_posts (title, content) VALUES ('Seventh Post', 'This is the content of the seventh post');
INSERT INTO blog_posts (title, content) VALUES ('Eighth Post', 'This is the content of the eighth post');
INSERT INTO blog_posts (title, content) VALUES ('Ninth Post', 'This is the content of the ninth post');
INSERT INTO blog_posts (title, content) VALUES ('Tenth Post', 'This is the content of the tenth post');
