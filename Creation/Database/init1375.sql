CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', 'Custom Size 1');
INSERT INTO orders (productName, customSize) VALUES ('Sofa', 'Custom Size 2');
INSERT INTO orders (productName, customSize) VALUES ('Bed Frame', 'Custom Size 3');
INSERT INTO orders (productName, customSize) VALUES ('Coffee Table', 'Custom Size 4');
INSERT INTO orders (productName, customSize) VALUES ('Bookshelf', 'Custom Size 5');
INSERT INTO orders (productName, customSize) VALUES ('Dresser', 'Custom Size 6');
INSERT INTO orders (productName, customSize) VALUES ('Desk', 'Custom Size 7');
INSERT INTO orders (productName, customSize) VALUES ('TV Stand', 'Custom Size 8');
INSERT INTO orders (productName, customSize) VALUES ('Console Table', 'Custom Size 9');
INSERT INTO orders (productName, customSize) VALUES ('Sideboard', 'Custom Size 10');
