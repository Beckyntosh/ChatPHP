CREATE TABLE IF NOT EXISTS orders (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(255) NOT NULL,
    customSize VARCHAR(255) NOT NULL,
    quantity INT(11) NOT NULL,
    reg_date TIMESTAMP
);

INSERT INTO orders (productName, customSize, quantity) VALUES ('Custom Guitar', 'Medium', 2);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Piano', 'Grand', 1);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Violin', 'Small', 3);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Drums', 'Large', 1);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Flute', 'Regular', 4);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Saxophone', 'Large', 2);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Harp', 'Medium', 1);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Accordion', 'Small', 3);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Trumpet', 'Regular', 1);
INSERT INTO orders (productName, customSize, quantity) VALUES ('Cello', 'Large', 2);
