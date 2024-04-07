CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('Alice', 'alice@example.com', 'password123');
INSERT INTO users (name, email, password) VALUES ('Bob', 'bob@example.com', 'securepassword');
INSERT INTO users (name, email, password) VALUES ('Charlie', 'charlie@example.com', 'letmein');
INSERT INTO users (name, email, password) VALUES ('David', 'david@example.com', 'abc123');
INSERT INTO users (name, email, password) VALUES ('Eve', 'eve@example.com', 'password321');
INSERT INTO users (name, email, password) VALUES ('Frank', 'frank@example.com', 'qwerty');
INSERT INTO users (name, email, password) VALUES ('Grace', 'grace@example.com', 'p@ssw0rd');
INSERT INTO users (name, email, password) VALUES ('Heather', 'heather@example.com', 'letmein1');
INSERT INTO users (name, email, password) VALUES ('Ivan', 'ivan@example.com', 'securepass');
INSERT INTO users (name, email, password) VALUES ('Jack', 'jack@example.com', 'password456');