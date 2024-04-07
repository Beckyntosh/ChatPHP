CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'secret321');
INSERT INTO users (username, password) VALUES ('admin', 'admin123');
INSERT INTO users (username, password) VALUES ('test_user', 'testpass');
INSERT INTO users (username, password) VALUES ('user123', 'pass456');
INSERT INTO users (username, password) VALUES ('new_user', 'newpass');
INSERT INTO users (username, password) VALUES ('demo_user', 'demo123');
INSERT INTO users (username, password) VALUES ('guest', 'guestpass');
INSERT INTO users (username, password) VALUES ('superuser', 'superpass');
INSERT INTO users (username, password) VALUES ('poweruser', 'powerpass');
