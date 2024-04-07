CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255),
    reg_date TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', 'Custom size 1');
INSERT INTO orders (productName, customSize) VALUES ('Bookshelf', 'Custom size 2');
INSERT INTO orders (productName, customSize) VALUES ('Desk', 'Custom size 3');
INSERT INTO orders (productName, customSize) VALUES ('Chair', 'Custom size 4');
INSERT INTO orders (productName, customSize) VALUES ('Sofa', 'Custom size 5');
INSERT INTO orders (productName, customSize) VALUES ('Coffee Table', 'Custom size 6');
INSERT INTO orders (productName, customSize) VALUES ('Bed', 'Custom size 7');
INSERT INTO orders (productName, customSize) VALUES ('Dresser', 'Custom size 8');
INSERT INTO orders (productName, customSize) VALUES ('TV Stand', 'Custom size 9');
INSERT INTO orders (productName, customSize) VALUES ('Side Table', 'Custom size 10');
