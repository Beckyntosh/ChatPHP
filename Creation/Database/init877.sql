CREATE TABLE IF NOT EXISTS users(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    username VARCHAR(50),
    password VARCHAR(100)
);

INSERT INTO users (firstname, lastname, email, username, password) 
VALUES ('Alice', 'Smith', 'alice@example.com', 'alice23', 'password123'),
       ('Bob', 'Johnson', 'bob@example.com', 'bob89', 'securepassword'),
       ('Charlie', 'Brown', 'charlie@example.com', 'cbrown', 'pass123'),
       ('David', 'Williams', 'dave@example.com', 'dwill', 'qwerty321'),
       ('Emma', 'Taylor', 'emma@example.com', 'etaylor', 'secretpass'),
       ('Frank', 'Miller', 'frank@example.com', 'fmiller', 'mypass123'),
       ('Grace', 'Moore', 'grace@example.com', 'gmoore', 'mypassword'),
       ('Henry', 'Young', 'henry@example.com', 'hyoung', 'password321'),
       ('Ivy', 'Lee', 'ivy@example.com', 'ivyl', 'pass432'),
       ('Jack', 'Clark', 'jack@example.com', 'jclark', 'testing123');
