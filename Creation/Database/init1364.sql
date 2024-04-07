CREATE TABLE IF NOT EXISTS custom_orders (
  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(30) NOT NULL,
  email VARCHAR(50),
  product_type VARCHAR(50) NOT NULL,
  dimensions VARCHAR(50),
  details TEXT,
  reg_date TIMESTAMP
);

INSERT INTO custom_orders (customer_name, email, product_type, dimensions, details) VALUES 
('John Doe', 'johndoe@example.com', 'Wooden Dining Table', '120x80x75', 'Custom engraving on the table top.'),
('Alice Smith', 'alice.smith@example.com', 'Custom Jacket', 'Size M', 'Retro style with floral embroidery.'),
('Bob Johnson', 'bobjohnson@example.com', 'Handmade Jewelry', 'Various sizes', 'Silver and gemstone combination pieces.'),
('Emily White', 'emily.white@example.com', 'Vintage Dress', 'Size S', 'Polka dots pattern with lace trim.'),
('Michael Brown', 'michaelbrown@example.com', 'Custom Shoes', 'EU 42', 'Leather material with personalized monogram.'),
('Sarah Davis', 'sarah.davis@example.com', 'Designer Handbag', 'N/A', 'Request for unique design and color scheme.'),
('Alex Garcia', 'alex.garcia@example.com', 'Tailored Suit', 'Size L', 'Traditional pinstripe pattern with modern cut.'),
('Eva Martinez', 'eva.martinez@example.com', 'Personalized Watch', 'N/A', 'Gold-plated with custom inscription.'),
('Daniel Wilson', 'danielwilson@example.com', 'Bespoke Hat', 'Head circumference 58cm', 'Fedora style with feather detail.'),
('Olivia Lee', 'olivia.lee@example.com', 'Custom Scarf', 'Length 180cm', 'Hand-knitted wool blend in specific colors.');
