CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(50),
    reg_date TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('wooden dining table', '120x80cm');
INSERT INTO orders (productName, customSize) VALUES ('portable kitchenware', 'N/A');
INSERT INTO orders (productName, customSize) VALUES ('dining chair', 'Set of 4');
INSERT INTO orders (productName, customSize) VALUES ('coffee table', '100x60cm');
INSERT INTO orders (productName, customSize) VALUES ('cookware set', '8 pieces');
INSERT INTO orders (productName, customSize) VALUES ('cutlery set', '16 pieces');
INSERT INTO orders (productName, customSize) VALUES ('portable gas stove', 'Single burner');
INSERT INTO orders (productName, customSize) VALUES ('glassware set', '12 pieces');
INSERT INTO orders (productName, customSize) VALUES ('kitchen utensil set', '7 pieces');
INSERT INTO orders (productName, customSize) VALUES ('cooking pot', '4.5 liters');