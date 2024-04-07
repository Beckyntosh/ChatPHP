CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    facebook_id VARCHAR(255) UNIQUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB;

INSERT INTO users (name, email, facebook_id) VALUES 
('Alice', 'alice@example.com', '123456789'),
('Bob', 'bob@example.com', '987654321'),
('Charlie', 'charlie@example.com', '456789123'),
('David', 'david@example.com', '789123456'),
('Eve', 'eve@example.com', '654321789'),
('Frank', 'frank@example.com', '321456789'),
('Grace', 'grace@example.com', '456789321'),
('Henry', 'henry@example.com', '789321456'),
('Ivy', 'ivy@example.com', '654789321'),
('Jack', 'jack@example.com', '321789456');
