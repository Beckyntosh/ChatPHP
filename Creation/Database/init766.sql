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

INSERT INTO blog_posts (title, content, author_id) VALUES 
('First Post', 'This is the first blog post', 1),
('Second Post', 'This is the second blog post', 2),
('Third Post', 'This is the third blog post', 3),
('Fourth Post', 'This is the fourth blog post', 1),
('Fifth Post', 'This is the fifth blog post', 2),
('Sixth Post', 'This is the sixth blog post', 3),
('Seventh Post', 'This is the seventh blog post', 1),
('Eighth Post', 'This is the eighth blog post', 2),
('Ninth Post', 'This is the ninth blog post', 3),
('Tenth Post', 'This is the tenth blog post', 1);

INSERT INTO users (username, name, email, password) VALUES 
('user1', 'User One', 'user1@example.com', 'password1'),
('user2', 'User Two', 'user2@example.com', 'password2'),
('user3', 'User Three', 'user3@example.com', 'password3');
