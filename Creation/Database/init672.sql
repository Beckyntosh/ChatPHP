CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL
);

CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    description TEXT
);

INSERT INTO users (name, email) VALUES ('John Doe', 'john@example.com');
INSERT INTO users (name, email) VALUES ('Jane Smith', 'jane@example.com');
INSERT INTO users (name, email) VALUES ('Alice Johnson', 'alice@example.com');
INSERT INTO users (name, email) VALUES ('Bob Brown', 'bob@example.com');
INSERT INTO users (name, email) VALUES ('Emma Davis', 'emma@example.com');
INSERT INTO users (name, email) VALUES ('Michael Wilson', 'michael@example.com');
INSERT INTO users (name, email) VALUES ('Sarah Moore', 'sarah@example.com');
INSERT INTO users (name, email) VALUES ('David Martinez', 'david@example.com');
INSERT INTO users (name, email) VALUES ('Olivia Taylor', 'olivia@example.com');
INSERT INTO users (name, email) VALUES ('James Anderson', 'james@example.com');

INSERT INTO products (name, price, description) VALUES ('Product 1', 49.99, 'Description for Product 1');
INSERT INTO products (name, price, description) VALUES ('Product 2', 29.99, 'Description for Product 2');
INSERT INTO products (name, price, description) VALUES ('Product 3', 39.99, 'Description for Product 3');
INSERT INTO products (name, price, description) VALUES ('Product 4', 59.99, 'Description for Product 4');
INSERT INTO products (name, price, description) VALUES ('Product 5', 19.99, 'Description for Product 5');
INSERT INTO products (name, price, description) VALUES ('Product 6', 69.99, 'Description for Product 6');
INSERT INTO products (name, price, description) VALUES ('Product 7', 79.99, 'Description for Product 7');
INSERT INTO products (name, price, description) VALUES ('Product 8', 89.99, 'Description for Product 8');
INSERT INTO products (name, price, description) VALUES ('Product 9', 99.99, 'Description for Product 9');
INSERT INTO products (name, price, description) VALUES ('Product 10', 49.99, 'Description for Product 10');
