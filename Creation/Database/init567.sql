CREATE TABLE orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  user_id INT NOT NULL,
  product_id INT NOT NULL,
  quantity INT NOT NULL
);

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255) NOT NULL
);

INSERT INTO products (name) VALUES ('Product A');
INSERT INTO products (name) VALUES ('Product B');
INSERT INTO products (name) VALUES ('Product C');
INSERT INTO products (name) VALUES ('Product D');
INSERT INTO products (name) VALUES ('Product E');
INSERT INTO products (name) VALUES ('Product F');
INSERT INTO products (name) VALUES ('Product G');
INSERT INTO products (name) VALUES ('Product H');
INSERT INTO products (name) VALUES ('Product I');
INSERT INTO products (name) VALUES ('Product J');

INSERT INTO orders (user_id, product_id, quantity) VALUES (1, 1, 5);
INSERT INTO orders (user_id, product_id, quantity) VALUES (1, 3, 3);
INSERT INTO orders (user_id, product_id, quantity) VALUES (2, 2, 2);
INSERT INTO orders (user_id, product_id, quantity) VALUES (2, 4, 1);
INSERT INTO orders (user_id, product_id, quantity) VALUES (3, 5, 4);
INSERT INTO orders (user_id, product_id, quantity) VALUES (3, 7, 2);
INSERT INTO orders (user_id, product_id, quantity) VALUES (4, 8, 6);
INSERT INTO orders (user_id, product_id, quantity) VALUES (4, 10, 3);
INSERT INTO orders (user_id, product_id, quantity) VALUES (5, 6, 1);
INSERT INTO orders (user_id, product_id, quantity) VALUES (5, 9, 2);
