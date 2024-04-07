CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('Alice', 'password123');
INSERT INTO users (username, password) VALUES ('Bob', 'securepass456');
INSERT INTO users (username, password) VALUES ('Charlie', 'letmein789');
INSERT INTO users (username, password) VALUES ('David', 'p@55w0rd!');
INSERT INTO users (username, password) VALUES ('Eve', 'secretp@ss');
INSERT INTO users (username, password) VALUES ('Frank', 'admin123');
INSERT INTO users (username, password) VALUES ('Grace', 'strongpassword');
INSERT INTO users (username, password) VALUES ('Henry', 'qwertyuiop');
INSERT INTO users (username, password) VALUES ('Ivy', 'myp@ssw0rd');
INSERT INTO users (username, password) VALUES ('Jack', 'pass1234');
