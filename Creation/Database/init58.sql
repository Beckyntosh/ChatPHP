CREATE TABLE IF NOT EXISTS blog_posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    FULLTEXT (title, content)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO blog_posts (title, content) VALUES ('First Post', 'This is the first blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Second Post', 'This is the second blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Third Post', 'This is the third blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Fourth Post', 'This is the fourth blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Fifth Post', 'This is the fifth blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Sixth Post', 'This is the sixth blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Seventh Post', 'This is the seventh blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Eighth Post', 'This is the eighth blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Ninth Post', 'This is the ninth blog post content.');
INSERT INTO blog_posts (title, content) VALUES ('Tenth Post', 'This is the tenth blog post content.');
