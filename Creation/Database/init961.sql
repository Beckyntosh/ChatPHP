CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS reviews (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id INT(6) UNSIGNED NOT NULL,
  rating INT(1) NOT NULL,
  comment TEXT NOT NULL,
  reg_date TIMESTAMP,
  FOREIGN KEY (product_id) REFERENCES products(id)
);

INSERT INTO products (name, description, reg_date) VALUES 
('Laptop A', 'Description for Laptop A', now()),
('Laptop B', 'Description for Laptop B', now()),
('Laptop C', 'Description for Laptop C', now()),
('Laptop D', 'Description for Laptop D', now()),
('Laptop E', 'Description for Laptop E', now()),
('Laptop F', 'Description for Laptop F', now()),
('Laptop G', 'Description for Laptop G', now()),
('Laptop H', 'Description for Laptop H', now()),
('Laptop I', 'Description for Laptop I', now()),
('Laptop J', 'Description for Laptop J', now());

INSERT INTO reviews (product_id, rating, comment, reg_date) VALUES 
(1, 4, 'Good laptop', now()),
(2, 3, 'Average laptop', now()),
(3, 5, 'Excellent laptop', now()),
(4, 2, 'Not satisfied with the laptop', now()),
(5, 1, 'Poor quality laptop', now()),
(6, 4, 'Great value for money', now()),
(7, 4, 'Satisfied with the laptop', now()),
(8, 3, 'Needs improvement in performance', now()),
(9, 5, 'Highly recommended', now()),
(10, 2, 'Disappointed with the laptop', now());