CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL
);

CREATE TABLE messages (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    message TEXT,
    timestamp TIMESTAMP,
    FOREIGN KEY(user_id) REFERENCES users(id)
);

INSERT INTO users (username, email) VALUES ('Alice', 'alice@example.com');
INSERT INTO users (username, email) VALUES ('Bob', 'bob@example.com');
INSERT INTO users (username, email) VALUES ('Charlie', 'charlie@example.com');
INSERT INTO users (username, email) VALUES ('David', 'david@example.com');
INSERT INTO users (username, email) VALUES ('Eve', 'eve@example.com');
INSERT INTO users (username, email) VALUES ('Frank', 'frank@example.com');
INSERT INTO users (username, email) VALUES ('Grace', 'grace@example.com');
INSERT INTO users (username, email) VALUES ('Hannah', 'hannah@example.com');
INSERT INTO users (username, email) VALUES ('Ivy', 'ivy@example.com');
INSERT INTO users (username, email) VALUES ('Jack', 'jack@example.com');