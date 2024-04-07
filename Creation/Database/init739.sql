CREATE TABLE users (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    email VARCHAR(50)
);

CREATE TABLE products (
    id INT PRIMARY KEY,
    name VARCHAR(50),
    user_id INT
);

INSERT INTO users (id, name, email) VALUES 
(1, 'Alice', 'alice@example.com'),
(2, 'Bob', 'bob@example.com'),
(3, 'Charlie', 'charlie@example.com'),
(4, 'David', 'david@example.com'),
(5, 'Eve', 'eve@example.com'),
(6, 'Frank', 'frank@example.com'),
(7, 'Grace', 'grace@example.com'),
(8, 'Henry', 'henry@example.com'),
(9, 'Ivy', 'ivy@example.com'),
(10, 'Jack', 'jack@example.com');

INSERT INTO products (id, name, user_id) VALUES
(1, 'Product A', 1),
(2, 'Product B', 1),
(3, 'Product C', 2),
(4, 'Product D', 2),
(5, 'Product E', 3),
(6, 'Product F', 3),
(7, 'Product G', 4),
(8, 'Product H', 4),
(9, 'Product I', 5),
(10, 'Product J', 5);
