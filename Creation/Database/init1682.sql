CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  category VARCHAR(50),
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS comparisons (
  comparison_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product1_id INT(6) UNSIGNED,
  product2_id INT(6) UNSIGNED,
  compare_date TIMESTAMP,
  FOREIGN KEY (product1_id) REFERENCES products(id),
  FOREIGN KEY (product2_id) REFERENCES products(id)
);

INSERT INTO products (name, description, price, category) VALUES ('Soap', 'Long-lasting and moisturizing soap', 5.99, 'Bath Products');
INSERT INTO products (name, description, price, category) VALUES ('Shampoo', 'Sulfate-free and nourishing shampoo', 8.50, 'Hair Care');
INSERT INTO products (name, description, price, category) VALUES ('Body Wash', 'Refreshing and invigorating body wash', 6.75, 'Bath Products');
INSERT INTO products (name, description, price, category) VALUES ('Hand Soap', 'Gentle and antibacterial hand soap', 3.99, 'Personal Care');
INSERT INTO products (name, description, price, category) VALUES ('Bath Bombs', 'Fizzy and aromatic bath bombs', 4.50, 'Bath Products');
INSERT INTO products (name, description, price, category) VALUES ('Conditioner', 'Hydrating and smoothing conditioner', 7.25, 'Hair Care');
INSERT INTO products (name, description, price, category) VALUES ('Lotion', 'Moisturizing and softening lotion', 6.99, 'Skin Care');
INSERT INTO products (name, description, price, category) VALUES ('Shower Gel', 'Luxurious and creamy shower gel', 9.99, 'Bath Products');
INSERT INTO products (name, description, price, category) VALUES ('Facial Cleanser', 'Gentle and effective facial cleanser', 10.50, 'Skin Care');
INSERT INTO products (name, description, price, category) VALUES ('Bubble Bath', 'Whimsical and foamy bubble bath', 5.25, 'Bath Products');
