CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(100) NOT NULL,
    security_question INT NOT NULL,
    security_answer VARCHAR(100) NOT NULL);

CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(50) NOT NULL,
    product_price DECIMAL(10, 2) NOT NULL);

INSERT INTO users (name, email, password, security_question, security_answer) 
VALUES ('John Doe', 'john@example.com', 'password123', 1, 'Answer1'),
       ('Jane Smith', 'jane@example.com', 'securepass', 2, 'Answer2'),
       ('Alice Johnson', 'alice@example.com', 'testpassword', 3, 'Answer3'),
       ('Bob Brown', 'bob@example.com', 'mysecret123', 4, 'Answer4'),
       ('Sarah Wilson', 'sarah@example.com', 'pass1234', 5, 'Answer5');

INSERT INTO products (product_name, product_price) 
VALUES ('Product 1', 10.99),
       ('Product 2', 25.50),
       ('Product 3', 5.75),
       ('Product 4', 18.99),
       ('Product 5', 99.99);
