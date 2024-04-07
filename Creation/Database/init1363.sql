CREATE TABLE IF NOT EXISTS custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  product VARCHAR(50) NOT NULL,
  dimensions VARCHAR(50) NOT NULL,
  details TEXT NOT NULL,
  reg_date TIMESTAMP
);

INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('John Doe', 'johndoe@example.com', 'Wooden Dining Table', '120x60x75 cm', 'Custom size and design with unique carvings');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Alice Smith', 'alice.smith@example.com', 'Wooden Dining Table', '150x70x80 cm', 'Round edges and natural finish');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Bob Johnson', 'bob.johnson@example.com', 'Wooden Dining Table', '140x80x75 cm', 'Modern style with glass top');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Emily Brown', 'emily.brown@example.com', 'Wooden Dining Table', '130x60x70 cm', 'Traditional design with intricate patterns');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Michael Wilson', 'michael.wilson@example.com', 'Wooden Dining Table', '160x80x75 cm', 'Eco-friendly materials and minimalist look');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Sophia Martinez', 'sophia.martinez@example.com', 'Wooden Dining Table', '120x60x75 cm', 'Custom color and finish');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('William Taylor', 'william.taylor@example.com', 'Wooden Dining Table', '140x70x75 cm', 'Vintage style with distressed look');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Olivia Clark', 'olivia.clark@example.com', 'Wooden Dining Table', '150x80x75 cm', 'Rustic design with reclaimed wood');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Daniel Rodriguez', 'daniel.rodriguez@example.com', 'Wooden Dining Table', '130x60x70 cm', 'Handcrafted details and sturdy construction');
INSERT INTO custom_orders (customer_name, email, product, dimensions, details) VALUES ('Ava Lewis', 'ava.lewis@example.com', 'Wooden Dining Table', '160x80x75 cm', 'Sleek and modern design with geometric shapes');
