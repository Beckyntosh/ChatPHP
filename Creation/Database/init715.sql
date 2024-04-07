CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    event VARCHAR(50) NOT NULL
);

INSERT INTO users (name, email, event) VALUES ('Alice', 'alice@example.com', 'Conference');
INSERT INTO users (name, email, event) VALUES ('Bob', 'bob@example.com', 'Workshop');
INSERT INTO users (name, email, event) VALUES ('Charlie', 'charlie@example.com', 'Seminar');
INSERT INTO users (name, email, event) VALUES ('David', 'david@example.com', 'Training');
INSERT INTO users (name, email, event) VALUES ('Eve', 'eve@example.com', 'Meeting');
INSERT INTO users (name, email, event) VALUES ('Frank', 'frank@example.com', 'Webinar');
INSERT INTO users (name, email, event) VALUES ('Grace', 'grace@example.com', 'Symposium');
INSERT INTO users (name, email, event) VALUES ('Henry', 'henry@example.com', 'Panel Discussion');
INSERT INTO users (name, email, event) VALUES ('Ivy', 'ivy@example.com', 'Roundtable');
INSERT INTO users (name, email, event) VALUES ('Jack', 'jack@example.com', 'Lecture');