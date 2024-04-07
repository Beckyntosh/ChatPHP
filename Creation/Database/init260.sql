CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT
);

INSERT INTO users (firstname, lastname, email, reg_date) VALUES ('John', 'Doe', 'john.doe@example.com', NOW());
INSERT INTO users (firstname, lastname, email, reg_date) VALUES ('Jane', 'Smith', 'jane.smith@example.com', NOW());
INSERT INTO users (firstname, lastname, email, reg_date) VALUES ('Mike', 'Johnson', 'mike.johnson@example.com', NOW());
INSERT INTO users (firstname, lastname, email, reg_date) VALUES ('Emily', 'Brown', 'emily.brown@example.com', NOW());
INSERT INTO users (firstname, lastname, email, reg_date) VALUES ('Chris', 'Wilson', 'chris.wilson@example.com', NOW());

INSERT INTO products (product_name, price, description) VALUES ('Laptop', 999.99, 'High-performance laptop with SSD storage');
INSERT INTO products (product_name, price, description) VALUES ('Smartphone', 599.99, 'Latest model with advanced features');
INSERT INTO products (product_name, price, description) VALUES ('Camera', 499.99, 'Professional DSLR camera');
INSERT INTO products (product_name, price, description) VALUES ('Headphones', 99.99, 'Noise-cancelling wireless headphones');
INSERT INTO products (product_name, price, description) VALUES ('Smartwatch', 199.99, 'Fitness tracking smartwatch');
