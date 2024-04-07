CREATE TABLE IF NOT EXISTS custom_orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(50),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '100x50');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '150x75');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '120x60');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '130x70');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '110x55');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '140x70');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '90x45');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '125x65');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '95x50');
INSERT INTO custom_orders (product_name, custom_size) VALUES ('wooden dining table', '135x70');
