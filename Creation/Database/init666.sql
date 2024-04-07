CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    receiver INT NOT NULL,
    content VARCHAR(255) NOT NULL,
    FOREIGN KEY (receiver) REFERENCES users(id)
);

INSERT INTO users (name) VALUES 
('Alice'),
('Bob'),
('Charlie'),
('David'),
('Emma'),
('Frank'),
('Grace'),
('Henry'),
('Ivy'),
('Jack');
