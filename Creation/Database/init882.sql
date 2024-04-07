CREATE TABLE IF NOT EXISTS blog_posts (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255),
    content TEXT,
    author_id INT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30),
    name VARCHAR(30),
    email VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 1', 'Content for Post 1', 1);
INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 2', 'Content for Post 2', 1);
INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 3', 'Content for Post 3', 2);
INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 4', 'Content for Post 4', 2);
INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 5', 'Content for Post 5', 3);
INSERT INTO blog_posts (title, content, author_id) VALUES ('Post 6', 'Content for Post 6', 3);
INSERT INTO users (username, name, email, password) VALUES ('user1', 'User One', 'user1@example.com', 'password1');
INSERT INTO users (username, name, email, password) VALUES ('user2', 'User Two', 'user2@example.com', 'password2');
INSERT INTO users (username, name, email, password) VALUES ('user3', 'User Three', 'user3@example.com', 'password3');
INSERT INTO users (username, name, email, password) VALUES ('user4', 'User Four', 'user4@example.com', 'password4');
