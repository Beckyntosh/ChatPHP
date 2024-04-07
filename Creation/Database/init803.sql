CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (username, email, password) VALUES ('Alice', 'alice@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('Bob', 'bob@example.com', 'securepass');
INSERT INTO users (username, email, password) VALUES ('Charlie', 'charlie@example.com', '123456');
INSERT INTO users (username, email, password) VALUES ('Diana', 'diana@example.com', 'diana123');
INSERT INTO users (username, email, password) VALUES ('Eve', 'eve@example.com', 'password123');
INSERT INTO users (username, email, password) VALUES ('Fiona', 'fiona@example.com', 'fiona456');
INSERT INTO users (username, email, password) VALUES ('George', 'george@example.com', 'georgepass');
INSERT INTO users (username, email, password) VALUES ('Hannah', 'hannah@example.com', 'hannah123');
INSERT INTO users (username, email, password) VALUES ('Isaac', 'isaac@example.com', 'isaacpass');
INSERT INTO users (username, email, password) VALUES ('Julia', 'julia@example.com', 'juliapass');
