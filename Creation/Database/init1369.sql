CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255) NOT NULL,
customSize VARCHAR(255) NOT NULL,
orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', '200x100x75cm');
INSERT INTO orders (productName, customSize) VALUES ('Custom Laptop', '15-inch display');
INSERT INTO orders (productName, customSize) VALUES ('Handmade Jewelry', 'Silver bracelet');
INSERT INTO orders (productName, customSize) VALUES ('Designer Dress', 'Size 8');
INSERT INTO orders (productName, customSize) VALUES ('Vintage Vinyl Records', 'Classic rock collection');
INSERT INTO orders (productName, customSize) VALUES ('Gourmet Gift Basket', 'Assorted treats');
INSERT INTO orders (productName, customSize) VALUES ('Personalized Stationery', 'Monogrammed notecards');
INSERT INTO orders (productName, customSize) VALUES ('Home Decor', 'Modern art sculpture');
INSERT INTO orders (productName, customSize) VALUES ('Luxury Watch', 'Chronograph style');
INSERT INTO orders (productName, customSize) VALUES ('Tech Gadgets', 'Latest model smartphone');
