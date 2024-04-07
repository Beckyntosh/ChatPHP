CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('john_doe', 'password123');
INSERT INTO users (username, password) VALUES ('jane_smith', 'securepass456');
INSERT INTO users (username, password) VALUES ('alice_wonderland', 'pa$$w0rd!');
INSERT INTO users (username, password) VALUES ('bob_marley', 'reggae123');
INSERT INTO users (username, password) VALUES ('charlie_brown', 'peanuts456');
INSERT INTO users (username, password) VALUES ('david_jones', 'djpassword789');
INSERT INTO users (username, password) VALUES ('emily_parker', 'sunshine987');
INSERT INTO users (username, password) VALUES ('frank_thomas', 'baseball123');
INSERT INTO users (username, password) VALUES ('grace_kelly', 'princess456');
INSERT INTO users (username, password) VALUES ('henry_adams', 'history789');
