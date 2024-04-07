CREATE TABLE blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL
);

INSERT INTO blog_posts (title, content) VALUES ('Introduction to PHP', 'PHP is a server-side scripting language');
INSERT INTO blog_posts (title, content) VALUES ('PHP Data Types', 'Learn about the different data types in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Functions', 'Understand how functions work in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Variables', 'Explore variable usage in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Loops', 'Master looping structures in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Arrays', 'Discover the power of arrays in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Forms', 'Create dynamic forms with PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP OOP', 'Dive into object-oriented programming in PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP MySQL Integration', 'Integrate MySQL database with PHP');
INSERT INTO blog_posts (title, content) VALUES ('PHP Security', 'Learn best practices for securing PHP applications');
