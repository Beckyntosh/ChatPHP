CREATE TABLE IF NOT EXISTS orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  productName VARCHAR(30) NOT NULL,
  customSize VARCHAR(50),
  orderDate TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO orders (productName, customSize) VALUES ('wooden dining table', '100x60');
INSERT INTO orders (productName, customSize) VALUES ('sofa', '3-seater');
INSERT INTO orders (productName, customSize) VALUES ('coffee table', '50x50');
INSERT INTO orders (productName, customSize) VALUES ('bed frame', 'queen size');
INSERT INTO orders (productName, customSize) VALUES ('dining chairs', 'set of 4');
INSERT INTO orders (productName, customSize) VALUES ('bookshelf', '6ft tall');
INSERT INTO orders (productName, customSize) VALUES ('desk', 'L-shaped');
INSERT INTO orders (productName, customSize) VALUES ('wardrobe', 'sliding doors');
INSERT INTO orders (productName, customSize) VALUES ('bar stool', 'adjustable height');
INSERT INTO orders (productName, customSize) VALUES ('side table', 'round');
