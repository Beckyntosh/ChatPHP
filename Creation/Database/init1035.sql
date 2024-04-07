CREATE TABLE IF NOT EXISTS products (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
name VARCHAR(30) NOT NULL,
description TEXT NOT NULL,
reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
product_id INT(6) UNSIGNED NOT NULL,
rating INT NOT NULL,
comment TEXT,
reg_date TIMESTAMP,
FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES ('Apple', 'Fresh juicy apples');
INSERT INTO products (name, description) VALUES ('Banana', 'Ripe yellow bananas');
INSERT INTO products (name, description) VALUES ('Milk', 'Fresh dairy milk');
INSERT INTO products (name, description) VALUES ('Eggs', 'Organic free-range eggs');
INSERT INTO products (name, description) VALUES ('Bread', 'Whole wheat bread loaf');
INSERT INTO products (name, description) VALUES ('Chicken', 'Skinless boneless chicken breast');
INSERT INTO products (name, description) VALUES ('Rice', 'Long-grain white rice');
INSERT INTO products (name, description) VALUES ('Cheese', 'Sharp cheddar cheese block');
INSERT INTO products (name, description) VALUES ('Tomato', 'Plump red tomatoes');
INSERT INTO products (name, description) VALUES ('Spinach', 'Fresh leafy green spinach');