CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('Alice', 'alice@example.com', 'password123');
INSERT INTO users (name, email, password) VALUES ('Bob', 'bob@example.com', 'securepassword');
INSERT INTO users (name, email, password) VALUES ('Charlie', 'charlie@example.com', 'password2021');
INSERT INTO users (name, email, password) VALUES ('David', 'david@example.com', 'david1234');
INSERT INTO users (name, email, password) VALUES ('Eve', 'eve@example.com', 'passwordEve');
INSERT INTO users (name, email, password) VALUES ('Fiona', 'fiona@example.com', 'fiona5678');
INSERT INTO users (name, email, password) VALUES ('George', 'george@example.com', 'georgePass');
INSERT INTO users (name, email, password) VALUES ('Hannah', 'hannah@example.com', 'hannahPassword');
INSERT INTO users (name, email, password) VALUES ('Ian', 'ian@example.com', 'passwordIan');
INSERT INTO users (name, email, password) VALUES ('Janet', 'janet@example.com', 'janetPass');
