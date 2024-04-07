CREATE TABLE IF NOT EXISTS orders (
  id INT AUTO_INCREMENT PRIMARY KEY,
  product VARCHAR(255) NOT NULL,
  dimensions VARCHAR(100) NOT NULL,
  quantity INT DEFAULT 1,
  status VARCHAR(50) DEFAULT 'pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO orders (product, dimensions, quantity) VALUES ('Wooden Dining Table', '100x50 cm', 2);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Baby Crib', '120x60 cm', 1);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Office Desk', '150x75 cm', 1);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Bookshelf', '180x30 cm', 3);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Sofa Set', '300x200 cm', 1);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Kitchen Table', '120x80 cm', 2);
INSERT INTO orders (product, dimensions, quantity) VALUES ('TV Stand', '100x40 cm', 1);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Dresser', '120x50 cm', 1);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Outdoor Chair', '50x50 cm', 4);
INSERT INTO orders (product, dimensions, quantity) VALUES ('Coffee Table', '80x80 cm', 2);
