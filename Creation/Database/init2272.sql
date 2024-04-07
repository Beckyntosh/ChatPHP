CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'securepassword');
INSERT INTO users (username, password) VALUES ('alice_jones', 'mypassword');
INSERT INTO users (username, password) VALUES ('bob_smith', 'letmein');
INSERT INTO users (username, password) VALUES ('sarah_doe', 'password456');
INSERT INTO users (username, password) VALUES ('chris_evans', 'capAmerica');
INSERT INTO users (username, password) VALUES ('emily_parker', 'password987');
INSERT INTO users (username, password) VALUES ('michael_brown', 'hello123');
INSERT INTO users (username, password) VALUES ('lisa_davis', 'mypassword321');
INSERT INTO users (username, password) VALUES ('kevin_jones', 'password789');
