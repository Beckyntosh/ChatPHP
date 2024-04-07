CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_id INT(6) UNSIGNED,
    user VARCHAR(50) NOT NULL,
    rating INT(1),
    comment TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES ('Watch 1', 'Description 1');
INSERT INTO products (name, description) VALUES ('Watch 2', 'Description 2');
INSERT INTO products (name, description) VALUES ('Watch 3', 'Description 3');
INSERT INTO products (name, description) VALUES ('Watch 4', 'Description 4');
INSERT INTO products (name, description) VALUES ('Watch 5', 'Description 5');
INSERT INTO products (name, description) VALUES ('Watch 6', 'Description 6');
INSERT INTO products (name, description) VALUES ('Watch 7', 'Description 7');
INSERT INTO products (name, description) VALUES ('Watch 8', 'Description 8');
INSERT INTO products (name, description) VALUES ('Watch 9', 'Description 9');
INSERT INTO products (name, description) VALUES ('Watch 10', 'Description 10');
