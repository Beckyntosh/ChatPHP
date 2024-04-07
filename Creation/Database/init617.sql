CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', MD5('password123'));
INSERT INTO users (username, password) VALUES ('jane_smith', MD5('password456'));
INSERT INTO users (username, password) VALUES ('mike_jones', MD5('password789'));
INSERT INTO users (username, password) VALUES ('sarah_davis', MD5('letmein'));
INSERT INTO users (username, password) VALUES ('chris_brown', MD5('abc123'));
INSERT INTO users (username, password) VALUES ('lisa_martin', MD5('password321'));
INSERT INTO users (username, password) VALUES ('kevin_adams', MD5('qwerty'));
INSERT INTO users (username, password) VALUES ('amanda_sanchez', MD5('p@ssw0rd'));
INSERT INTO users (username, password) VALUES ('brian_smith', MD5('welcome1'));
INSERT INTO users (username, password) VALUES ('jennifer_clark', MD5('passwordabc'));