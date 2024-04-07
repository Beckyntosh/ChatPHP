CREATE TABLE products (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT
);

CREATE TABLE wishlist (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    product_id INT NOT NULL,
    FOREIGN KEY (user_id) REFERENCES products(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES ('Medicine A', 'Description for Medicine A');
INSERT INTO products (name, description) VALUES ('Medicine B', 'Description for Medicine B');
INSERT INTO products (name, description) VALUES ('Medicine C', 'Description for Medicine C');
INSERT INTO products (name, description) VALUES ('Medicine D', 'Description for Medicine D');
INSERT INTO products (name, description) VALUES ('Medicine E', 'Description for Medicine E');
INSERT INTO products (name, description) VALUES ('Medicine F', 'Description for Medicine F');
INSERT INTO products (name, description) VALUES ('Medicine G', 'Description for Medicine G');
INSERT INTO products (name, description) VALUES ('Medicine H', 'Description for Medicine H');
INSERT INTO products (name, description) VALUES ('Medicine I', 'Description for Medicine I');
INSERT INTO products (name, description) VALUES ('Medicine J', 'Description for Medicine J');
