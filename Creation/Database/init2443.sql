CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'abc123', 'jane.smith@example.com');
INSERT INTO users (username, password, email) VALUES ('bob123', 'pass456', 'bob@example.com');
INSERT INTO users (username, password, email) VALUES ('sara85', 'qwerty', 'sara@example.com');
INSERT INTO users (username, password, email) VALUES ('mike25', 'letmein', 'mike@example.com');
INSERT INTO users (username, password, email) VALUES ('admin', 'admin123', 'admin@example.com');
INSERT INTO users (username, password, email) VALUES ('marydoe', 'hello123', 'mary.doe@example.com');
INSERT INTO users (username, password, email) VALUES ('testuser', 'testpass', 'testuser@example.com');
INSERT INTO users (username, password, email) VALUES ('newuser', 'newpass', 'newuser@example.com');
INSERT INTO users (username, password, email) VALUES ('user123', 'user456', 'user@example.com');
