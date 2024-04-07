CREATE TABLE users (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  user_id INT(6) NOT NULL,
  product_id INT(6) NOT NULL
);

CREATE TABLE products (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  product_name VARCHAR(30) NOT NULL
);

INSERT INTO products (product_name) VALUES ('Product 1');
INSERT INTO products (product_name) VALUES ('Product 2');
INSERT INTO products (product_name) VALUES ('Product 3');
INSERT INTO products (product_name) VALUES ('Product 4');
INSERT INTO products (product_name) VALUES ('Product 5');
INSERT INTO products (product_name) VALUES ('Product 6');
INSERT INTO products (product_name) VALUES ('Product 7');
INSERT INTO products (product_name) VALUES ('Product 8');
INSERT INTO products (product_name) VALUES ('Product 9');
INSERT INTO products (product_name) VALUES ('Product 10');
