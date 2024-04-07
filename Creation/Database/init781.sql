CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'securepass');
INSERT INTO users (username, password) VALUES ('user123', 'hello123');
INSERT INTO users (username, password) VALUES ('testuser', 'testpassword');
INSERT INTO users (username, password) VALUES ('admin', 'adminpass');
INSERT INTO users (username, password) VALUES ('newuser', 'newpass');
INSERT INTO users (username, password) VALUES ('guest1', 'guestpass');
INSERT INTO users (username, password) VALUES ('user007', 'password007');
INSERT INTO users (username, password) VALUES ('webuser', 'webpass');
INSERT INTO users (username, password) VALUES ('login123', 'loginpass');
