CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(32) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', MD5('password123'));
INSERT INTO users (username, password) VALUES ('jane_smith', MD5('abc123'));
INSERT INTO users (username, password) VALUES ('admin', MD5('adminpass'));
INSERT INTO users (username, password) VALUES ('user1', MD5('pass123'));
INSERT INTO users (username, password) VALUES ('user2', MD5('test456'));
INSERT INTO users (username, password) VALUES ('new_user', MD5('newpass'));
INSERT INTO users (username, password) VALUES ('test_user', MD5('testpass'));
INSERT INTO users (username, password) VALUES ('demo_user', MD5('demo123'));
INSERT INTO users (username, password) VALUES ('sample_user', MD5('samplepass'));
INSERT INTO users (username, password) VALUES ('guest', MD5('guest123'));