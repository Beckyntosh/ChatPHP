CREATE TABLE users (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(30) NOT NULL,
    lastname VARCHAR(30) NOT NULL,
    email VARCHAR(50),
    reg_date TIMESTAMP
);

CREATE TABLE products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    price DECIMAL(10,2) NOT NULL,
    description TEXT,
    created_at TIMESTAMP
);

INSERT INTO users (firstname, lastname, email) VALUES ('John', 'Doe', 'john.doe@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Jane', 'Smith', 'jane.smith@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Alice', 'Johnson', 'alice.johnson@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Bob', 'Williams', 'bob.williams@example.com');
INSERT INTO users (firstname, lastname, email) VALUES ('Emma', 'Brown', 'emma.brown@example.com');

INSERT INTO products (name, price, description) VALUES ('Product A', 25.50, 'Description for Product A');
INSERT INTO products (name, price, description) VALUES ('Product B', 35.75, 'Description for Product B');
INSERT INTO products (name, price, description) VALUES ('Product C', 40.00, 'Description for Product C');
INSERT INTO products (name, price, description) VALUES ('Product D', 15.99, 'Description for Product D');
INSERT INTO products (name, price, description) VALUES ('Product E', 29.99, 'Description for Product E');