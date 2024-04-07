CREATE TABLE IF NOT EXISTS orders (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(50) NOT NULL,
    dimensions VARCHAR(50) NOT NULL,
    orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '80x80x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '100x100x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '120x80x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '90x90x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '110x110x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '100x80x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '120x100x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '85x85x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '115x115x30');
INSERT INTO orders (productName, dimensions) VALUES ('Wooden Dining Table', '95x95x30');
