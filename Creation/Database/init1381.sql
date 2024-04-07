CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
productName VARCHAR(255) NOT NULL,
customSize VARCHAR(50),
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('Wooden Dining Table', '120x80cm');
INSERT INTO orders (productName, customSize) VALUES ('Custom Sofa', '200x100cm');
INSERT INTO orders (productName, customSize) VALUES ('Handcrafted Chair', 'Standard Size');
INSERT INTO orders (productName, customSize) VALUES ('Bespoke Bookshelf', '150x200cm');
INSERT INTO orders (productName, customSize) VALUES ('Artisan Coffee Table', '90x90cm');
INSERT INTO orders (productName, customSize) VALUES ('Rustic Sideboard', '160x50cm');
INSERT INTO orders (productName, customSize) VALUES ('Modern Desk', '120x60cm');
INSERT INTO orders (productName, customSize) VALUES ('Vintage Wardrobe', '180x200cm');
INSERT INTO orders (productName, customSize) VALUES ('Industrial Dining Set', '6 chairs and table');
INSERT INTO orders (productName, customSize) VALUES ('Minimalist Bed Frame', 'Queen Size');
