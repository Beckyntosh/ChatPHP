CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    role VARCHAR(20) NOT NULL
);

INSERT INTO users (username, role) VALUES ('user1', 'user');
INSERT INTO users (username, role) VALUES ('user2', 'user');
INSERT INTO users (username, role) VALUES ('user3', 'user');
INSERT INTO users (username, role) VALUES ('user4', 'user');
INSERT INTO users (username, role) VALUES ('user5', 'user');
INSERT INTO users (username, role) VALUES ('user6', 'user');
INSERT INTO users (username, role) VALUES ('user7', 'user');
INSERT INTO users (username, role) VALUES ('user8', 'user');
INSERT INTO users (username, role) VALUES ('moderator1', 'moderator');
INSERT INTO users (username, role) VALUES ('moderator2', 'moderator');