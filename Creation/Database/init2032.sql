CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(50) NOT NULL,
  brand VARCHAR(30) NOT NULL,
  description TEXT,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO products (productName, brand, description, price) VALUES ('Handbag1', 'Brand1', 'Description1', 50.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag2', 'Brand2', 'Description2', 75.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag3', 'Brand3', 'Description3', 100.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag4', 'Brand4', 'Description4', 120.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag5', 'Brand5', 'Description5', 80.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag6', 'Brand6', 'Description6', 60.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag7', 'Brand7', 'Description7', 90.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag8', 'Brand8', 'Description8', 110.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag9', 'Brand9', 'Description9', 70.00);
INSERT INTO products (productName, brand, description, price) VALUES ('Handbag10', 'Brand10', 'Description10', 95.00);
