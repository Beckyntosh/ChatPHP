CREATE TABLE IF NOT EXISTS Products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  features TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
);

CREATE TABLE IF NOT EXISTS ProductComparison (
  comparison_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_id1 INT(6) UNSIGNED,
  product_id2 INT(6) UNSIGNED,
  FOREIGN KEY (product_id1) REFERENCES Products(id),
  FOREIGN KEY (product_id2) REFERENCES Products(id),
  reg_date TIMESTAMP
);

INSERT INTO Products (name, features, price) VALUES ('Product 1', 'Features of Product 1', 499.99);
INSERT INTO Products (name, features, price) VALUES ('Product 2', 'Features of Product 2', 699.99);
INSERT INTO Products (name, features, price) VALUES ('Product 3', 'Features of Product 3', 799.99);
INSERT INTO Products (name, features, price) VALUES ('Product 4', 'Features of Product 4', 899.99);
INSERT INTO Products (name, features, price) VALUES ('Product 5', 'Features of Product 5', 999.99);
INSERT INTO Products (name, features, price) VALUES ('Product 6', 'Features of Product 6', 1099.99);
INSERT INTO Products (name, features, price) VALUES ('Product 7', 'Features of Product 7', 1199.99);
INSERT INTO Products (name, features, price) VALUES ('Product 8', 'Features of Product 8', 1299.99);
INSERT INTO Products (name, features, price) VALUES ('Product 9', 'Features of Product 9', 1399.99);
INSERT INTO Products (name, features, price) VALUES ('Product 10', 'Features of Product 10', 1499.99);
