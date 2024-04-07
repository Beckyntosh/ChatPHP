CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL,
    join_loyalty_program INT NOT NULL
);

INSERT INTO users (name, email, password, join_loyalty_program) VALUES
('Alice', 'alice@example.com', 'password1', 1),
('Bob', 'bob@example.com', 'password2', 0),
('Charlie', 'charlie@example.com', 'password3', 1),
('David', 'david@example.com', 'password4', 0),
('Emma', 'emma@example.com', 'password5', 1),
('Frank', 'frank@example.com', 'password6', 0),
('Grace', 'grace@example.com', 'password7', 1),
('Henry', 'henry@example.com', 'password8', 0),
('Ivy', 'ivy@example.com', 'password9', 1),
('Jack', 'jack@example.com', 'password10', 0);
