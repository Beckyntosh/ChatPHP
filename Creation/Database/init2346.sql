CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (name, email, password) VALUES ('John Doe', 'john@example.com', 'password123');
INSERT INTO users (name, email, password) VALUES ('Jane Smith', 'jane@example.com', 'pass456word');
INSERT INTO users (name, email, password) VALUES ('Alice Johnson', 'alice@example.com', 'abc789');
INSERT INTO users (name, email, password) VALUES ('Bob Brown', 'bob@example.com', 'test1234');
INSERT INTO users (name, email, password) VALUES ('Emily Davis', 'emily@example.com', 'pwd567');
INSERT INTO users (name, email, password) VALUES ('Mike Wilson', 'mike@example.com', 'secure4321');
INSERT INTO users (name, email, password) VALUES ('Sara Moore', 'sara@example.com', 'passw0rd');
INSERT INTO users (name, email, password) VALUES ('Chris Lee', 'chris@example.com', 'pwd12345');
INSERT INTO users (name, email, password) VALUES ('Laura Taylor', 'laura@example.com', 'abcxyz123');
INSERT INTO users (name, email, password) VALUES ('Sam White', 'sam@example.com', 'letmein567');
