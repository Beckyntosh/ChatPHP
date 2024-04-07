CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL,
  category VARCHAR(50),
  price DECIMAL(10,2) NOT NULL,
  rating FLOAT,
  reg_date TIMESTAMP
);

INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 1', 'Leather', 50.00, 4.5, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 2', 'Canvas', 45.00, 4.0, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 3', 'Suede', 60.00, 4.8, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 4', 'Leather', 70.00, 4.2, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 5', 'Canvas', 55.00, 4.6, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 6', 'Suede', 65.00, 4.4, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 7', 'Leather', 75.00, 4.7, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 8', 'Canvas', 52.00, 4.3, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 9', 'Suede', 68.00, 4.9, NOW());
INSERT INTO products (name, category, price, rating, reg_date) VALUES ('Handbag 10', 'Leather', 80.00, 4.1, NOW());