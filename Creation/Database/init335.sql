CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    recovery_code VARCHAR(6)
);

INSERT INTO users (email, password, recovery_code) VALUES ('user1@example.com', 'password1', '123456');
INSERT INTO users (email, password, recovery_code) VALUES ('user2@example.com', 'password2', '654321');
INSERT INTO users (email, password, recovery_code) VALUES ('user3@example.com', 'password3', '987654');
INSERT INTO users (email, password, recovery_code) VALUES ('user4@example.com', 'password4', '456789');
INSERT INTO users (email, password, recovery_code) VALUES ('user5@example.com', 'password5', '321654');
INSERT INTO users (email, password, recovery_code) VALUES ('user6@example.com', 'password6', '789456');
INSERT INTO users (email, password, recovery_code) VALUES ('user7@example.com', 'password7', '654987');
INSERT INTO users (email, password, recovery_code) VALUES ('user8@example.com', 'password8', '456123');
INSERT INTO users (email, password, recovery_code) VALUES ('user9@example.com', 'password9', '789321');
INSERT INTO users (email, password, recovery_code) VALUES ('user10@example.com', 'password10', '654123');
