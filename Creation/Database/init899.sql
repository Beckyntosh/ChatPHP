CREATE TABLE IF NOT EXISTS products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    description TEXT
);

INSERT INTO products (name, description) VALUES ('Product 1', 'Description for Product 1');
INSERT INTO products (name, description) VALUES ('Product 2', 'Description for Product 2');
INSERT INTO products (name, description) VALUES ('Product 3', 'Description for Product 3');
INSERT INTO products (name, description) VALUES ('Product 4', 'Description for Product 4');
INSERT INTO products (name, description) VALUES ('Product 5', 'Description for Product 5');
INSERT INTO products (name, description) VALUES ('Product 6', 'Description for Product 6');
INSERT INTO products (name, description) VALUES ('Product 7', 'Description for Product 7');
INSERT INTO products (name, description) VALUES ('Product 8', 'Description for Product 8');
INSERT INTO products (name, description) VALUES ('Product 9', 'Description for Product 9');
INSERT INTO products (name, description) VALUES ('Product 10', 'Description for Product 10');

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

INSERT INTO users (username, password) VALUES ('user1', 'password1');
