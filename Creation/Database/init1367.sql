CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    customSize VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', 'Custom Size 1');
INSERT INTO orders (productName, customSize) VALUES ('Sofa Set', 'Custom Size 2');
INSERT INTO orders (productName, customSize) VALUES ('Bed Frame', 'Custom Size 3');
INSERT INTO orders (productName, customSize) VALUES ('Curtains', 'Custom Size 4');
INSERT INTO orders (productName, customSize) VALUES ('Wall Art', 'Custom Size 5');
INSERT INTO orders (productName, customSize) VALUES ('Coffee Table', 'Custom Size 6');
INSERT INTO orders (productName, customSize) VALUES ('Bookshelf', 'Custom Size 7');
INSERT INTO orders (productName, customSize) VALUES ('Rug', 'Custom Size 8');
INSERT INTO orders (productName, customSize) VALUES ('Side Table', 'Custom Size 9');
INSERT INTO orders (productName, customSize) VALUES ('Accent Chair', 'Custom Size 10');
