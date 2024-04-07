CREATE TABLE IF NOT EXISTS products (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(30) NOT NULL,
    description TEXT,
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO products (product_name, description) VALUES ('iPhone 13', 'Latest iPhone model from Apple');
INSERT INTO products (product_name, description) VALUES ('Samsung Galaxy S21', 'Flagship smartphone from Samsung');
INSERT INTO products (product_name, description) VALUES ('MacBook Pro', 'High-performance laptop from Apple');
INSERT INTO products (product_name, description) VALUES ('Dell XPS 15', 'Premium Windows laptop');
INSERT INTO products (product_name, description) VALUES ('Amazon Kindle', 'Popular e-reader device');
INSERT INTO products (product_name, description) VALUES ('Sony WH-1000XM4', 'Wireless noise-canceling headphones');
INSERT INTO products (product_name, description) VALUES ('Samsung QLED TV', 'High-end smart TV with Quantum Dot technology');
INSERT INTO products (product_name, description) VALUES ('Nintendo Switch', 'Hybrid gaming console');
INSERT INTO products (product_name, description) VALUES ('Canon EOS R5', 'Professional mirrorless camera');
INSERT INTO products (product_name, description) VALUES ('Dyson V11', 'Powerful cordless vacuum cleaner');