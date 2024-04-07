CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    role VARCHAR(20) NOT NULL
);

INSERT INTO users (username, role) VALUES ('Alice', 'User');
INSERT INTO users (username, role) VALUES ('Bob', 'User');
INSERT INTO users (username, role) VALUES ('Charlie', 'Moderator');
INSERT INTO users (username, role) VALUES ('David', 'User');
INSERT INTO users (username, role) VALUES ('Eve', 'Administrator');
INSERT INTO users (username, role) VALUES ('Frank', 'User');
INSERT INTO users (username, role) VALUES ('Grace', 'User');
INSERT INTO users (username, role) VALUES ('Hannah', 'Moderator');
INSERT INTO users (username, role) VALUES ('Ivy', 'User');
INSERT INTO users (username, role) VALUES ('Jack', 'Administrator');
