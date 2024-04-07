CREATE TABLE IF NOT EXISTS products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  description TEXT,
  brand VARCHAR(30) NOT NULL,
  category VARCHAR(30) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO products (name, description, brand, category, price) VALUES ('Product1', 'Description1', 'Brand1', 'Category1', 10.99);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product2', 'Description2', 'Brand2', 'Category2', 20.99);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product3', 'Description3', 'Brand3', 'Category3', 15.49);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product4', 'Description4', 'Brand4', 'Category4', 30.75);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product5', 'Description5', 'Brand5', 'Category5', 25.99);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product6', 'Description6', 'Brand6', 'Category6', 12.50);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product7', 'Description7', 'Brand7', 'Category7', 18.99);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product8', 'Description8', 'Brand8', 'Category8', 22.25);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product9', 'Description9', 'Brand9', 'Category9', 17.75);
INSERT INTO products (name, description, brand, category, price) VALUES ('Product10', 'Description10', 'Brand10', 'Category10', 29.99);
