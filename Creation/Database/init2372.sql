CREATE TABLE IF NOT EXISTS forum_users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    password VARCHAR(255),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO forum_users (name, email, password) VALUES 
('Alice', 'alice@example.com', md5('password1')),
('Bob', 'bob@example.com', md5('password2')),
('Charlie', 'charlie@example.com', md5('password3')),
('David', 'david@example.com', md5('password4')),
('Eve', 'eve@example.com', md5('password5')),
('Frank', 'frank@example.com', md5('password6')),
('Grace', 'grace@example.com', md5('password7')),
('Henry', 'henry@example.com', md5('password8')),
('Ivy', 'ivy@example.com', md5('password9')),
('Jack', 'jack@example.com', md5('password10'));
