CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255) NOT NULL
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', 'Custom Size 1');
INSERT INTO orders (productName, customSize) VALUES ('Beauty Products Set', 'Custom Size 2');
INSERT INTO orders (productName, customSize) VALUES ('Makeup Kit', 'Custom Size 3');
INSERT INTO orders (productName, customSize) VALUES ('Skincare Bundle', 'Custom Size 4');
INSERT INTO orders (productName, customSize) VALUES ('Haircare Combo', 'Custom Size 5');
INSERT INTO orders (productName, customSize) VALUES ('Fragrance Gift Set', 'Custom Size 6');
INSERT INTO orders (productName, customSize) VALUES ('Facial Masks Pack', 'Custom Size 7');
INSERT INTO orders (productName, customSize) VALUES ('Manicure Kit', 'Custom Size 8');
INSERT INTO orders (productName, customSize) VALUES ('Lipstick Collection', 'Custom Size 9');
INSERT INTO orders (productName, customSize) VALUES ('Hair Styling Products Set', 'Custom Size 10');
