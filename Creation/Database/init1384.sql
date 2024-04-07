CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(255),
    quantity INT NOT NULL
);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('wooden dining table', 'custom', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('furniture set', NULL, 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('bedroom dresser', 'standard', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('office desk', 'custom', 3);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('living room sofa', NULL, 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('kitchen cabinet', 'standard', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('coffee table', 'custom', 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('bookshelf', 'custom', 1);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('side table', NULL, 2);
INSERT INTO orders (product_name, custom_size, quantity) VALUES ('dining chair set', 'standard', 4);
