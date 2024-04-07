CREATE TABLE orders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    custom_size VARCHAR(50) NOT NULL
);

INSERT INTO orders (product_name, custom_size) VALUES ('Wooden Dining Table', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Board Games', 'Standard');
INSERT INTO orders (product_name, custom_size) VALUES ('Glass Vase', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Handcrafted Jewelry', 'Medium');
INSERT INTO orders (product_name, custom_size) VALUES ('Hand-painted Artwork', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Vintage Furniture', 'Medium');
INSERT INTO orders (product_name, custom_size) VALUES ('Designer Clothing', 'Small');
INSERT INTO orders (product_name, custom_size) VALUES ('Metal Sculpture', 'Large');
INSERT INTO orders (product_name, custom_size) VALUES ('Home Decor Items', 'Standard');
INSERT INTO orders (product_name, custom_size) VALUES ('Customized Gifts', 'Medium');
