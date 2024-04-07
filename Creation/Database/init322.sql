CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    active INT DEFAULT 1
);

INSERT INTO users (active) VALUES (1), (1), (1), (0), (1), (0), (1), (0), (1), (1);
