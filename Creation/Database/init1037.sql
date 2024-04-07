CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(30) NOT NULL,
  description TEXT NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) UNSIGNED,
  user_name VARCHAR(30) NOT NULL,
  review TEXT NOT NULL,
  rating INT(1),
  reg_date TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description) VALUES ('Handbag 1', 'Stylish black leather handbag');
INSERT INTO products (name, description) VALUES ('Handbag 2', 'Colorful tote bag for everyday use');
INSERT INTO products (name, description) VALUES ('Handbag 3', 'Designer clutch for special occasions');
INSERT INTO products (name, description) VALUES ('Handbag 4', 'Crossbody bag with adjustable strap');
INSERT INTO products (name, description) VALUES ('Handbag 5', 'Chic shoulder bag with multiple compartments');

INSERT INTO reviews (product_id, user_name, review, rating) VALUES (1, 'Alice', 'Love this handbag! Great quality and perfect size.', 5);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (1, 'Bob', 'Nice design but the strap could be longer.', 4);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (2, 'Charlie', 'Very spacious and durable material.', 5);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (3, 'Diana', 'Gorgeous clutch, received many compliments.', 5);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (4, 'Eve', 'Comfortable to wear all day, love the color.', 4);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (5, 'Frank', 'Perfect for organizing my essentials.', 5);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (5, 'Grace', 'Beautiful design and sturdy construction.', 5);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (1, 'Heidi', 'Not as expected, stitching came loose quickly.', 2);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (3, 'Ivy', 'Bit expensive but worth it for the quality.', 4);
INSERT INTO reviews (product_id, user_name, review, rating) VALUES (2, 'Jack', 'The colors are brighter in person, love it!', 5);
