CREATE TABLE IF NOT EXISTS `products` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `description` text NOT NULL,
    `sku` varchar(100) NOT NULL,
    `image` varchar(255) DEFAULT NULL,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO products (name, description, sku) VALUES ('Product 1', 'Description of Product 1', 'SKU001');
INSERT INTO products (name, description, sku) VALUES ('Product 2', 'Description of Product 2', 'SKU002');
INSERT INTO products (name, description, sku) VALUES ('Product 3', 'Description of Product 3', 'SKU003');
INSERT INTO products (name, description, sku) VALUES ('Product 4', 'Description of Product 4', 'SKU004');
INSERT INTO products (name, description, sku) VALUES ('Product 5', 'Description of Product 5', 'SKU005');
INSERT INTO products (name, description, sku) VALUES ('Product 6', 'Description of Product 6', 'SKU006');
INSERT INTO products (name, description, sku) VALUES ('Product 7', 'Description of Product 7', 'SKU007');
INSERT INTO products (name, description, sku) VALUES ('Product 8', 'Description of Product 8', 'SKU008');
INSERT INTO products (name, description, sku) VALUES ('Product 9', 'Description of Product 9', 'SKU009');
INSERT INTO products (name, description, sku) VALUES ('Product 10', 'Description of Product 10', 'SKU010');