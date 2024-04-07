CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT,
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS orders (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED,
quantity INT(3),
order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES ('Wooden Dining Table', 'Custom-sized wooden dining table.');
INSERT INTO products (name, description) VALUES ('Leather Sofa', 'Vintage-style leather sofa.');
INSERT INTO products (name, description) VALUES ('Crystal Chandelier', 'Elegant crystal chandelier.');
INSERT INTO products (name, description) VALUES ('Persian Rug', 'Hand-woven Persian rug.');
INSERT INTO products (name, description) VALUES ('Antique Clock', 'Grandfather antique clock.');
INSERT INTO products (name, description) VALUES ('Velvet Armchair', 'Luxurious velvet armchair.');
INSERT INTO products (name, description) VALUES ('Bronze Statue', 'Artistic bronze statue.');
INSERT INTO products (name, description) VALUES ('Mahogany Bookshelf', 'Classic mahogany bookshelf.');
INSERT INTO products (name, description) VALUES ('Marble Coffee Table', 'Sleek marble coffee table.');
INSERT INTO products (name, description) VALUES ('Copper Vase', 'Ornate copper vase.');
