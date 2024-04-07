CREATE TABLE IF NOT EXISTS users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    password VARCHAR(60) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS events (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    eventName VARCHAR(30) NOT NULL,
    eventDate DATE NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO users (username, password, email) VALUES ('john_doe', 'password123', 'john_doe@example.com');
INSERT INTO users (username, password, email) VALUES ('jane_smith', 'p@ssw0rd', 'jane_smith@example.com');
INSERT INTO users (username, password, email) VALUES ('alice_wonderland', 'alice123!', 'alice@wonderland.com');
INSERT INTO users (username, password, email) VALUES ('bob_the_builder', 'buildit123', 'bob@builder.com');
INSERT INTO users (username, password, email) VALUES ('sarah_conner', 'terminator', 'sarah@conner.com');

INSERT INTO events (eventName, eventDate) VALUES ('Conference A', '2022-10-15');
INSERT INTO events (eventName, eventDate) VALUES ('Workshop X', '2023-01-20');
INSERT INTO events (eventName, eventDate) VALUES ('Seminar Z', '2022-12-05');
INSERT INTO events (eventName, eventDate) VALUES ('Training Session Y', '2023-03-08');
INSERT INTO events (eventName, eventDate) VALUES ('Symposium B', '2023-06-17');
